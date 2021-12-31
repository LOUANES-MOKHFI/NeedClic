<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use App\Http\Requests\Admin\AdminRequest;
use Uuid;
class AdminController extends Controller
{
    public function index()
    {
        $data=[];
        $data['admins'] = Admin::all();
        return view('admin.admins.index',$data);
    }

   
    public function create()
    {
        $data = [];
        $data['roles'] = Roles::all();
        return view('admin.admins.add',$data);
    }

   
    public function store(AdminRequest $request)
    {   
        
        try {
            $admin = Admin::create([
                'uuid' => Uuid::generate()->string,
                'name' => $request->name,
                'email' => $request->email,
                'password'=> bcrypt($request->password),
                'role_id' => $request->role_id,

            ]);
            return redirect()->route('admin.admins')->with(['success' => "L'Admin est ajoutée avec success"]);
        } catch (Exception $e) {
            return redirect()->route('admin.admins')->with(['error' => 'Verifiez vos informations !!']);
        }

    }

    
    public function show($id)
    {
        
    }

    
    public function edit($uuid)
    {
       $data = [];
        $data['roles'] = Roles::all();
        $data['admin'] = Admin::isAdmin($uuid)->first();
        if(!$data['admin']){
            return redirect()->route('admin.admins')->with(['error'=>' L\'admin n\'existe pas']);
        }
        return view('admin.admins.edit',$data);
    }

    
    public function update(AdminRequest $request, $uuid)
    {
        $data = [];
        $data['admin'] = Admin::isAdmin($uuid)->first();
        if(!$data['admin']){
            return redirect()->route('admin.admins')->with(['error'=>'L\'admin n\'existe pas']);
        }
        $data['admin']->update([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.admins')->with(['success' => "L'admin a étè modifiée avec success"]);

    }

   
    public function destroy($id)
    {
        $data = [];
        $data['admin'] = Admin::where('id',$id)->first();
        if(!$data['admin']){
            return redirect()->route('admin.admins')->with(['error'=>'L\'admin n\'existe pas']);
        }
        $data['admin']->delete();

        return redirect()->route('admin.admins')->with(['success' => "L'admin a étè supprimée avec success"]);

    }
}
