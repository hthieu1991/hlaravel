<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function registerUser(Request $request){
        // dd($request->input("username"));
        // echo $request->input("username");
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }
}
