<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /* ---------------

    -----------------*/
    public function index()
    {
        return view('auth.register');
    }
    //
    public function store(Request $request)
    {
        // dd($request->name, $request->username, $request->email, $request->password);
        $this->validate($request, [
            'name'=>'required|max:10',
            'username'=>'required|max:5',
            'email'=>'required|email|max:100',
            'password'=>'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);

    }
}
