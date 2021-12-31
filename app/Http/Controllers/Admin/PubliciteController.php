<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publicite;
use App\Http\Requests\Admin\PubliciteRequest;
use Uuid;
use Str;
class PubliciteController extends Controller
{
    public function index()
    {
        $data=[];
        $data['publicites'] = Publicite::all();
        return view('admin.publicites.index',$data);
    }

   
    public function create()
    {
        return view('admin.publicites.add');
    }

   
    public function store(PubliciteRequest $request)
    {   
        
        try {
            if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();

              

                $publicite = Publicite::create([
                'uuid' => Uuid::generate()->string,
                'title' => $request->title,
                'image'=> $file_name,
                'description' => $request->description,
                ]);
                
                ///Move Image
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('Publicite/'.$publicite->title),$imageName);
            }
            return redirect()->route('admin.publicite')->with(['success' => "La publicite est ajoutée avec success"]);
        } catch (Exception $e) {
            return redirect()->route('admin.publicite')->with(['error' => 'Verifiez vos informations !!']);
        }

    }

    
    public function show($uuid)
    {
        
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['publicite'] = Publicite::where('uuid',$uuid)->first();
        if(!$data['publicite']){
            return redirect()->route('admin.publicite')->with(['error'=>'cette publicite n\'existe pas']);
        }
        return view('admin.publicites.edit',$data);
    }

    
    public function update(PubliciteRequest $request, $uuid)
    {
        $data = [];
        $data['publicites'] = Publicite::where('uuid',$uuid)->first();
        if(!$data['publicites']){
            return redirect()->route('admin.publicite')->with(['error'=>'cette publicites n\'existe pas']);
        }
        if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                
                $data['publicites']->update([
                'title' => $request->title,
                'description' => $request->description,
                'image'=> $file_name,
                ]);
                
                ///Move Image
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('Publicite/'.$data['publicite']->title),$imageName);
            }

        return redirect()->route('admin.publicite')->with(['success' => "La publicite est modifiée avec success"]);

    }

   
    public function destroy($uuid)
    {
        $data = [];
        $data['publicite'] = Publicite::where('uuid',$uuid)->first();
        if(!$data['publicite']){
            return redirect()->route('admin.publicite')->with(['error'=>'cette publicite n\'existe pas']);
        }
        $data['publicite']->delete();

        return redirect()->route('admin.publicite')->with(['success' => "La publicite est supprimée avec success"]);

    }

    public function changeStatus(Request $request){
        $data['publicite'] = Publicite::where('uuid',$request->uuid)->first();
        if(!$data['publicite']){
            return redirect()->route('admin.publictes')->with(['error'=>'cette publicite n\'existe pas']);
        }
        
        $status = $request->in_home;
        $data['publicite']->in_home = $status;
        $data['publicite']->save();
        return redirect()->back()->with(['success' => "le status de la publicite a étè changée avec success"]);

    }

    public function AddToBasPage($uuid){
        $data['publicite'] = Publicite::where('uuid',$uuid)->first();
        if(!$data['publicite']){
            return redirect()->route('admin.publictes')->with(['error'=>'cette publicite n\'existe pas']);
        }
        $status = $data['publicite']->bas_home == 0 ? 1 : 0 ;
         // return $status;
        $data['publicite']->bas_home = $status;
        $data['publicite']->save();
        return redirect()->back()->with(['success' => "le status de la publicite a étè changée avec success"]);

    }
}
