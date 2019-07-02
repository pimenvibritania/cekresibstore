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
            $data = DB::table('resis')->orderBy('tglOrder', 'desc')->paginate(10);
            # code...
        } elseif (Auth::user()->hasAnyRole('reseller')) {
            # code...
            $data = DB::table('resis')->where('email_reseller','=',"{$cari}")->paginate();

        }     


        return view('resi', compact('data'));
    }


    public function show(Resi $resi){
    
        $data = $resi->id;
        $inv = Resi::find($data)->resi;
        $kurir = Resi::find($data)->kurir;
        
        $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
        $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
        $config['account_type'] = 'pro';
        $rajaongkir = new Rajaongkir($config);
        
    
        $waybill = $rajaongkir->getWaybill($inv, $kurir);

        return view('resi_show',compact('resi'))->with('waybill', $waybill);

       


    }

    public function fetch_data(Request $request)
    {
    
    }

    public function import(){
        // $reader->formatDates(false);
        Excel::import(new ResiImport, request()->file('file'));

        return back()->with('success','Upload successfully!');

    }

    public function export(){
        return Excel::download(new ResiExport, 'resi.xlsx');
        // return (new ResiExport)->download('users.xlsx');


    }

    
}
