<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
 

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function userlogin(){
        return view('userlogin');
    }

    public function userlog(Request $request){
        $no_hp = User::where('noHp', $request->noHp)->first();
        if ($no_hp) {
            # code...
            if ($no_hp->hasAnyRole('user')) {
                # code...
                Auth::loginUsingId($no_hp->id);
                return redirect()->route('resi.index');
            }else{
                return redirect('/userlogin')->with('danger','1');
            }
        } else{
            return redirect('/userlogin')->with('danger','2');
        }
        

    }
}
