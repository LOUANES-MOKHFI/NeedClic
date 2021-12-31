<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SettingRequest;

use App\Models\Roles;
use App\Models\Setting;
class SettingsController extends Controller
{
    public function index(){
        $data = [];
        $data['roles'] = Roles::all();
        return view('admin.settings.index',$data);
    }

    public function create(){

    	return view('admin.settings.create');
    }

    public function edit($id){
    	$data = [];
    	$data['setting'] = Setting::findOrFail($id);
    	return view('admin.settings.edit',$data);
    }

    public function update(Request $request,$id){
    	try {
	    	$data = [];
	    	$data['setting'] = Setting::findOrFail($id);
            if($request->has('logo')){
	    	$image = $request->file('logo');
            $file_name = $image->getClientOriginalName();
                $data['setting']->update([
                'logo' => $file_name,
                ]);
                $imageName = $request->logo->getClientOriginalName();
                $request->logo->move(public_path('Logo/'.$data['setting']->logo),$imageName);
            }

	    	$data['setting']->update([
	    		'email' => $request->email,
	    		'phone' => $request->phone,
                'facebook' => $request->facebook,
	    		'instagram' => $request->instagram,
	    		'youtube' => $request->youtube,
	    		'twitter' => $request->twitter,
	    		'linkedin' => $request->linkedin,
	    		'slogon' => $request->slogon,
	    		'droit_auteur' => $request->droit_auteur,
	    		'adress' => $request->adress,
	    	]);
    	 	///Move Image
            

    		return redirect()->back()->with(['success'=>'Les paramétres géneraux sont modifier avec success']);
    	} catch (Exception $e) {
    		return redirect()->back()->with(['error'=>'erreur de systeme, veuillez essayez plus tard']);
    	}
    	
    }
}
