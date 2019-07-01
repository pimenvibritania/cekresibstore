<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;

class TrackController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // $tracking = DB::table('resis')->paginate(10);
        // return redirect()->route('track');
        // dd($tracking);
        return view('tracking');

    }

    public function search(Request $request){

        $cari = $request->cari;

        
        $tracking = DB::table('resis')
        ->where('invoice','=',"{$cari}")->paginate();

        // dd($tracking);
        // return view('tracking',['invoice' => $tracking]);
        return view('trackings', compact('tracking'));

    }
}
