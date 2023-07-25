<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        
        return view('login');
        
    }
    
    public function login_proses(Request $request){
        
        // dd($request->all());
        $request -> validate([
            "email" => 'required|max:50|email|exists:users,email',
            "password" => 'required|min:5|max:20',
        ]);

        $user = User::where('email',$request->email)->first();

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
                return redirect('/dashboard');
        }else{
            
            return redirect()->back()->withErrors(['password' => 'Password is Invalid']);

        }
    }
    
    public function logout(){

        Auth::logout();
        return redirect('/');

    }


}
