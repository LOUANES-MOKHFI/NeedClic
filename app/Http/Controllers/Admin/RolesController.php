<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Http\Requests\Admin\RolesRequest;
use Carbon\Carbon;
use Uuid;
class RolesController extends Controller
{
    public function index(){
        $roles = Roles::get();
        return view('admin.settings.roles.index',compact('roles'));
    }

    public function create(){
        return view('admin.settings.roles.add');
    }

    public function store(RolesRequest $request){
        try {
            $role = $this->process(new Roles, $request);
            if($role){
                return redirect()->route('admin.settings.roles')->with(['success' => 'Le role est ajoutée avec succées']);
            }
            else{
                return redirect()->route('admin.settings.roles')->with(['error' => 'Erreur,Verifier vos informations']);
            }
        } catch (\Throwable $e) {

            return redirect()->route('admin.settings.roles')->with(['error' => 'Erreur,Verifier vos informations']);
        }
    }

    public function edit($uuid){
        $role = Roles::isRole($uuid)->first();
            if(!$role){
                return redirect()->route('admin.settings.roles')->with(['error' => "ce role n'existe pas"]);
            }else{
               return view('admin.settings.roles.edit',compact('role'));
            }
    }

    public function update($uuid,RolesRequest $request){
        try {

            $role = Roles::isRole($uuid)->first();
            if(!$role){
                return redirect()->route('admin.settings.roles')->with(['error' => "ce role n'existe pas"]);
            }
            $role = $this->process($role, $request);
            if($role){
                return redirect()->route('admin.settings.roles')->with(['success' => 'Le role est Modifiée avec succées']);
            }
            else{
                return redirect()->route('admin.settings.roles')->with(['error' => 'Erreur,Verifier vos informations']);
            }
        } catch (\Throwable $e) {

            return redirect()->route('admin.settings.roles')->with(['error' => 'Erreur,Verifier vos informations']);
        }
    }

    public function destroy($uuid){
        $role = Roles::isRole($uuid)->first();
        if(!$role){
            return redirect()->route('admin.settings.roles')->with(['error' => "ce role n'existe pas"]);

        }
        else{
            $role->delete();
            return redirect()->route('admin.settings.roles')->with(['success' => 'Le role est Supprimée avec succées']);

        }
    }
    protected function process(Roles $role, Request $request){
        $role->uuid = Uuid::generate()->string;
        $role->name = $request->name;
        $role->permissions = json_encode($request->permissions);
        $role->save();
        return $role;
    }
}
