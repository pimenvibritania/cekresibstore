<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use App\Role; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            # code...
            return redirect()->route('admin.users.index')->with('danger','Admin gabisa ngerubah role admin brooo!');
        }

        return view ('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
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
        if (Auth::user()->id == $id) {
            # code...
            return redirect()->route('admin.users.index')->with('danger','Admin gabisa ngerubah role admin brooo!');;
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success','Data berhasil di update Gannnn!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            # code...
            return redirect()->route('admin.users.index')->with('danger','Admin gabisa ngehapus admin brooo :v!');;
        }
        //
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success','User berhasil di hapus!');
    }

    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noHp' => 'required',
        ]);

        User::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'password' => Hash::make($request-> password),
            'noHp'=> $request-> noHp,
        ]); 

        return redirect()->route('admin.users.index')->with('success','User berhasil di tambahkan');
    }
}
