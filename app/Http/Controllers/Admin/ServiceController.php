<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\Admin\ServiceRequest;
use Uuid;
use Str;
class ServiceController extends Controller
{
     public function index()
    {
        $data=[];
        $data['services'] = Service::all();
        return view('admin.settings.services.index',$data);
    }

   
    public function create()
    {
        return view('admin.settings.services.add');
    }

   
    public function store(ServiceRequest $request)
    {	
    	
    	try {
            if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();

                $slug = Str::slug($request->name);

        		$service = Service::create([
                'slug' => $slug,
                'name' => $request->name,
                'image'=> $file_name,
                'description' => $request->description,
                ]);
                
                ///Move Image
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('Service/'.$service->id),$imageName);
            }
        	return redirect()->route('admin.settings.services')->with(['success' => "L'service est ajoutée avec success"]);
    	} catch (Exception $e) {
    		return redirect()->route('admin.settings.services')->with(['error' => 'Verifiez vos informations !!']);
    	}

    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $data = [];
        $data['service'] = Service::where('id',$id)->first();
        if(!$data['service']){
            return redirect()->route('admin.settings.services')->with(['error'=>'cette service n\'existe pas']);
        }
        return view('admin.settings.services.edit',$data);
    }

    
    public function update(ServiceRequest $request, $id)
    {
        $data = [];
        $data['service'] = Service::where('id',$id)->first();
        if(!$data['service']){
            return redirect()->route('admin.settings.services')->with(['error'=>'cette service n\'existe pas']);
        }
        if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                
                $slug = Str::slug($request->name);
                $data['service']->update([
                'slug' => $slug,
                'name' => $request->name,
                'description' => $request->description,
                'image'=> $file_name,
                ]);
                
                ///Move Image
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('Service/'.$data['service']->id),$imageName);
            }

        return redirect()->route('admin.settings.services')->with(['success' => "L'service est modifiée avec success"]);

    }

   
    public function destroy($id)
    {
        $data = [];
        $data['service'] = Service::where('id',$id)->first();
        if(!$data['service']){
            return redirect()->route('admin.settings.services')->with(['error'=>'cette service n\'existe pas']);
        }
        $data['service']->delete();

        return redirect()->route('admin.settings.services')->with(['success' => "L'service est supprimée avec success"]);

    }
}
