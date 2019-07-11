<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\Rajaongkir;
use Illuminate\Support\Facades\DB;
use App\Resi;
// use DB;

class TrackController extends Controller
{
    //

  

    public function index(){
        // $tracking = DB::table('resis')->paginate(10);
        // return redirect()->route('track');
        // dd($tracking);
        return view('tracking');

    }

    public function show(Resi $resi){
        return view('trackuser_show', compact('resi'));
    }
    public function trackUser(Resi $resi){

        $data = $resi->id;
        $inv = Resi::find($data)->resi;
        $kurir = Resi::find($data)->kurir;
        
        $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
        $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
        $config['account_type'] = 'pro';
        $rajaongkir = new Rajaongkir($config);
        
        // dd($data);
        
        $waybill = $rajaongkir->getWaybill($inv, $kurir);
        
        return view('trackuser_track',compact('resi'))->with('waybill', $waybill);

    }

    public function search(Request $request){

        $cari = $request->cari;

        
        $tracking = DB::table('resis')
        ->where('noHp','=',"{$cari}")->paginate();


        if(count($tracking) < 1 ){
            return back()->with('danger','No HP yang anda masukan gagal');
        }else{
            
            
            // dd($tracking);
            // return view('tracking',['invoice' => $tracking]);
            return view('trackings', compact('tracking'));
        }

    }
}
