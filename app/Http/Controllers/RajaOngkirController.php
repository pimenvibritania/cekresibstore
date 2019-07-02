<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\Rajaongkir;

class RajaOngkirController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function index()
    // {
    //     $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
    //     $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
    //     $config['account_type'] = 'pro';
    //     $rajaongkir = new Rajaongkir($config);
    //     $provinces = $rajaongkir->getProvinces();
    //     $waybill = $rajaongkir->getWaybill('SOCAG00183235715', 'jne');
    //     $inter = $rajaongkir->getInternationalDestinations();
    //     $cities = $rajaongkir->getCities();
    //     $internationalOrigins = $rajaongkir->getInternationalOrigins();


    //     // return $waybill;

    //     // dd($provinces)
    //     return view('rajaongkir')->with('waybill', $waybill);
    //     // return $provinces;
    // }

    // public function show(){
    //     $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
    //     $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
    //     $config['account_type'] = 'pro';
    //     $rajaongkir = new Rajaongkir($config);
    //     $provinces = $rajaongkir->getProvinces();
    //     $waybill = $rajaongkir->getWaybill($invoice, $kurir);



    // }

    public function input(){
        return view('input_resi');
    }

    public function proses(Request $request)
    {
        $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
        $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
        $config['account_type'] = 'pro';
        $rajaongkir = new Rajaongkir($config);
        $this->validate($request,[
           'resi' => 'required',
           'kurir' => 'required',
           
        ]);
            
        $invoice = $request->resi;
        $kurir = $request->kurir;
        $waybill = $rajaongkir->getWaybill($invoice, $kurir);

        return view('proses')->with('waybill', $waybill);
    }
}
