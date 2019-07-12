<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ResiExport;
use App\Imports\ResiImport;
use Maatwebsite\Excel\Facades\Excel;
use Steevenz\Rajaongkir;
use DB;
use App\Resi; 
use Illuminate\Support\Facades\Auth;

class ResiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){

        $cari  = Auth::user()->email;

        if(Auth::user()->hasAnyRole('user')){
            return redirect()->route('userview');
        }
        elseif(Auth::user()->hasAnyRole('admin')) {
            app('App\Http\Controllers\ResiController')->kirimWa();
            $data = DB::table('resis')->orderBy('tglOrder', 'desc')->paginate(10);
            # code...
        } elseif (Auth::user()->hasAnyRole('reseller')) {
            # code...
            $data = DB::table('resis')->where('email_reseller','=',"{$cari}")->paginate();

        }     
 

        return view('resi', compact('data'));
    }


    public function show(Resi $resi){
     
        return view('resi_show',compact('resi'));

    }

    public function trackResi(Resi $resi){

        $data = $resi->id;
        $inv = Resi::find($data)->resi;
        $kurir = Resi::find($data)->kurir;
        
        $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
        $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
        $config['account_type'] = 'pro';
        $rajaongkir = new Rajaongkir($config);
        
        // dd($data);
    
        $waybill = $rajaongkir->getWaybill($inv, $kurir);
        return view('track_show',compact('resi'))->with('waybill', $waybill);

    }

    public function fetch_data(Request $request)
    {
        $cari = $request->cari;

        $data = DB::table('resis')->where('nama','LIKE',"%".$cari."%")->orWhere('noHp','LIKE',"%".$cari."%")
                                    ->orWhere('produk','LIKE',"%".$cari."%")->orWhere('invoice','LIKE',"%".$cari."%")
                                    ->orWhere('resi','LIKE',"%".$cari."%")
                                    ->orWhere('tglOrder','LIKE',"%".$cari."%")->paginate(10);

        return view('resi', ['data' => $data]);

    }

    public function import(){
        Excel::import(new ResiImport, request()->file('file'));

        return back()->with('success','Upload successfully!');

    }

    public function export(){
        return Excel::download(new ResiExport, 'resi.xlsx');
        // return (new ResiExport)->download('users.xlsx');

        // $skip = DB::table('resis')->where('resi','IS NULL','AND','flag','=','0');

    }
    
    public function kirimWa(){
       
        $kirim = Resi::whereNotNull('resi')->where('flag', 0)->get();

        // echo $kirim;
        // die();
        //udah dapet dua data dari atas

        foreach ($kirim as $k) {
            # code...
                //$k->noHp;
                //kalo udah dapet no hape nya mau manggil function kirim wa dengan nohp nya $k;
                $produk = $k->produk;
                app('App\Http\Controllers\ResiController')->send_wa($k->noHp, $produk);
                $k->flag = 1;
                $k->save();
                //dd($k);
                //tapi di dd juga ga bisa, ga nampil data nya langsung ke halaman view
        }

    
    }

    public function send_wa($k, $produk)
    {
    
    $notif= "Saya pimen dr BStore, produk kamu yaitu = ".$produk." Telah di kirim, silahkan cek di http://cekresi.billionairestore.co.id";
    $data["domain"] ="member.billionairestore.co.id";    //only domain name without http:// or https:// or www.
          $data["license"] ="5d15e02424984";
          $nope = (int)$k;
          $data["wa_number"] = '62'.$nope;     //use format 628xxx (country code first)
          //$data["file"]="https://my.woo-wa.com/wp-content/uploads/2019/04/Woowa-Bulat-Hijau-Padding-BG-PUTIH.jpg";    //path of file must be https protocol
          $data["caption"] = "this is caption";    //optional 
          $data["text"] =$notif;    //body message same as whatsapp massage, you can use markdown whatsapp 
          $data["mode"] ="sync";    //optional, if you want to detect number unregistered by WA. response number_not_found (take more time) 
          
          $url="http://api.woo-wa.com/v2.0/send-message"; 
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,$url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($ch);
          $err = curl_error($ch);
          curl_close ($ch);
    }

    
}
