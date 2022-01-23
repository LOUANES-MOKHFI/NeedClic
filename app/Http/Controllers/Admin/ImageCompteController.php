<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageCompte;

class ImageCompteController extends Controller
{
   public function index()
    {
        $data=[];
        $data['comptes'] = ImageCompte::all();
        return view('admin.settings.images.index',$data);
    }

    public function edit($id)
    {
        $data = [];
        $data['compte'] = ImageCompte::where('id',$id)->first();
        if(!$data['compte']){
            return redirect()->route('admin.settings.images')->with(['error'=>'ce type de  compte n\'existe pas']);
        }
        return view('admin.settings.images.edit',$data);
    }
    
    public function update(Request $request, $id)
    {
        //return $request;
        $data = [];
        $data['compte'] = ImageCompte::where('id',$id)->first();
        if(!$data['compte']){
            return redirect()->route('admin.settings.images')->with(['error'=>'ce type de compte n\'existe pas']);
        }
        $data['compte']->update([
            'name' => $request->name,
            ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            ///Move Image
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('Compte/'.$data['compte']->id),$imageName);
            $data['compte']->update([
            'image'=> $file_name,
            ]);        
        }

        return redirect()->route('admin.settings.images')->with(['success' => "Le type de compte est modifiée avec success"]);

    }

}
