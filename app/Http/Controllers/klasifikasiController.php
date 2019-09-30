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

class klasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data = DB::table('resis')->orderBy('tglOrder', 'desc')->paginate(10);

        $rajaongkir = new Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Rajaongkir::ACCOUNT_PRO);
        $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
        $config['account_type'] = 'pro';
        $rajaongkir = new Rajaongkir($config);

        // $waybill = $rajaongkir->getWaybill($inv, $kurir);

        //

        return view('klasifikasi', compact('data'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
