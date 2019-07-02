<?php

namespace App\Http\Middleware;

use Closure;
use App\Resi;
use Illuminate\Support\Facades\Auth;
use DB;

class Reseller
{
    /** 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->resi->id;
        $cari  = Auth::user()->email;
        $data = Resi::where('email_reseller', $cari)->where('id', $id)->first();
        if (Auth::user()->hasAnyRole('admin')) {
            # code...
            return $next($request);
            
        }
        elseif ($data) {
            # code...
            // return view('resi_show',compact('resi'));
            // dd($data);
            return $next($request);
        }
        else {
            return redirect()->route('resi.index')->with('danger','Invoice yang anda akses bukan milik anda');
        }
    }
}
