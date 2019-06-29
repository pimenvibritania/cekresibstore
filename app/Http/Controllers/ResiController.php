<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ResiExport;
use App\Imports\ResiImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Resi;

class ResiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $data = DB::table('resis')->orderBy('tglOrder', 'desc')->paginate(10);
        return view('resi', compact('data'));
    }


    public function show(Resi $resi){

        return view('resi_show',compact('resi'));

    }

    public function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $data = DB::table('resis')
                    ->where('id', 'like', '%'.$query.'%')
                    ->orWhere('nama', 'like', '%'.$query.'%')
                    ->orWhere('invoice', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(10);
      return view('resi_data', compact('data'))->render();
     }
    }

    // FILTER TANGGAL

    // public function fetch_data_f(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   if($request->from_date != '' && $request->to_date != '')
    //   {
    //    $data = DB::table('resis')
    //      ->whereBetween('tglOrder', array($request->from_date, $request->to_date))
    //      ->get();
    //   }
    //   else
    //   {
    //    $data = DB::table('resis')->orderBy('tglOrder', 'desc')->get();
    //   }
    //   echo json_encode($data);

    //  }
    // }

    public function import(){
        Excel::import(new ResiImport,request()->file('file'));

        return back()->with('success','Upload successfully!');

    }

    public function export(){
        return Excel::download(new ResiExport, 'resi.xlsx');

    }
}
