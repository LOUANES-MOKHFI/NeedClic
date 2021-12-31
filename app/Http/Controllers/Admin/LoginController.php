<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminLoginRequest;

class LoginController extends Controller
{
     public function login(){

        return view('admin.auth.login');
    }

    public function Postlogin(AdminLoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

    	if(auth()->guard('admins')->attempt(['email' => $request->input("email"), 'password' => $request->input('password')])){
    		//notify()->success('vous étès connecter avec success');
    		return redirect()->route('admin.index');
    	}
    	//notify()->error('email ou mot de passe incorrect');
          return redirect()->back()->with(['error' => 'Email ou mot de passe incorrect']);
    }

    public function logout(){
        $gaurd = $this->getGaurd();
        $gaurd->logout();
        return redirect()->route('admin.login');
    }

    private function getGaurd(){
        return auth('admins');
    }
}
