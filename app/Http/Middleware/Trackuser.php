<?php

namespace App\Http\Middleware;

use Closure;
use App\Resi;
use DB;
class Trackuser
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
        $nope = $request->resi->noHp;
        $id = $request->resi->id;
        $data = Resi::where('noHp', $nope)->where('id', $id)->first();

        if($data){ 
            return $next($request);
        }else{
            return back()->with('danger','Invoice yang anda akses bukan milik anda');

        }
            
    }
}
