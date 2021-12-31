<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Admin\ProfilRequest;
use App\Http\Requests\Admin\ProfilPasswordRequest;

class ProfilController extends Controller
{
    public function editProfil(){
    	$data=[];
    	$auth_user = auth('admins')->user()->id;
        $data['member'] = Admin::where('id',$auth_user)->first();
         if(!$data['member']){
            return redirect()->route('admin.profil.edit')->with(['error'=>"Ce profil n'existe pas"]);
        }
        return view('admin.profil.index',$data);
    }
    public function updateProfil(ProfilRequest $request, $uuid)
    {
    	$auth_user = auth('admins')->user()->id;
        $data['member'] = Admin::isAdmin($uuid)->where('id',$auth_user)->first();
         if(!$data['member']){
            return redirect()->route('admin.profil.edit')->with(['error'=>"Ce profil n'existe pas"]);
        }
        try {
            $data['member']->update([
                'name'    => $request->name,
                'email'   => $request->email,
            ]);

            return redirect()->back()->with(['success'=>"Votre profil a étè modifiée avec success"]);

        } catch (Exception $e) {
            return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
        }
    }
   

    public function updateProfilPassword(ProfilPasswordRequest $request, $uuid)
    {
    	$auth_user = auth('admins')->user()->id;
        $data['member'] = Admin::isAdmin($uuid)->where('id',$auth_user)->first();
         if(!$data['member']){
            return redirect()->back()->with(['error'=>"Ce profil n'existe pas"]);
        }
        try {
            $data['member']->update([
                'password'=> bcrypt($request->password),
            ]);

            return redirect()->back()->with(['success'=>"Votre Mot de passe a étè modifiée avec success"]);

        } catch (Exception $e) {
            return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
        }
    }
}
