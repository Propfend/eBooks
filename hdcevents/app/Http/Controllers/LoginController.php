<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_form(){
        return view('site.loginForm');
    }

    public function login(Request $request){

        $this->validate($request, [
           'email' => 'required|email:rfc,dns' ,
           'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        $authenticated = Auth::attempt($credentials);

        if(!$authenticated){
            return redirect()->back()->with('erro', 'Erro ao logar!');
        }
            return redirect()->intended('site.main');
    }

    public function register_form(){
        return view('site.registerForm');
    }

    public function register(Request $request){
        $validated = $this->validate($request, [
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
            'firstname' => 'required',
            'lastname' => 'required',
         ],           [
             'email.unique' => 'Este email já está sendo utilizado',
            ]);

        $user = new User();

        $data = [
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
        ];

        $user->create($data);

        $credentials = $request->only('email', 'password');

        $authenticated = Auth::attempt($credentials);

        if(!$authenticated){
            return redirect()->back()->with('erro', 'Erro ao logar!');
        }
            return redirect()->intended('/');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->Session()->invalidate();
        $request->Session()->regenerateToken();
        return redirect(route('site.main'));
    }

}