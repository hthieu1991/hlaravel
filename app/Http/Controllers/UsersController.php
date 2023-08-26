<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function registerUser(Request $request){
        // dd($request->input("username"));
        // echo $request->input("username");
        $validateData = $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // $userModel = new User;
        // $userModel->name = $request->input("name");
        // $userModel->username = $request->input("username");
        // $userModel->password = $request->input("password");
        // $userModel->email = $request->input("email");
        // $userModel->save();

        // Save data into database
        $user = User::create(request(['name', 'username', 'email', 'password']));
        
        // Save user info into auth - session
        auth()->login($user);
        
        // dd(auth()->user()->name);

        return redirect()->to('/');
    }

    function loginUser(Request $request){
        $validateData = $request->validate( [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($validateData) == false){
            return back()->withErrors([
                'message' => 'Email or password incorrect. Please check again'
            ]);
        } 

        return redirect()->to('/');
    }

    // Make logout
    function logoutUser(Request $request){
        //Logout user
        Auth::logout();
        // Invalidate session
        $request->session()->invalidate();
        //Regenerate token
        $request->session()->regenerateToken();

        return redirect()->to('/');

    }

    // Make profile
    function profileUser(){
        $userdata = auth()->user();
        return view('profile', compact("userdata"));

    }
}
