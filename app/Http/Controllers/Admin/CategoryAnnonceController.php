<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryAnnonces;
use App\Http\Requests\Admin\CategoryRequest;
use Uuid;
use Str;
class CategoryAnnonceController extends Controller
{
    public function index()
    {   
    
        $data=[];
        $data['categories'] = CategoryAnnonces::all();
        return view('admin.settings.categories_annonces.index',$data);
    }

   
    public function create()
    {
        return view('admin.settings.categories_annonces.add');
    }

   
    public function store(CategoryRequest $request)
    {	
    	
    	try {
            if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();

            $slug = Str::slug($request->name);
    		$category = CategoryAnnonces::create([

        	'name' => $request->name,
            'slug' => $slug,
            'category_compte' => $request->category_compte,
            'image'=> $file_name,
        	]);
            ///Move Image
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('Category/'.$category->id),$imageName);

            }
        	return redirect()->route('admin.settings.categories_annonces')->with(['success' => 'La categorie est ajoutée avec success']);
    	} catch (Exception $e) {
    		return redirect()->route('admin.settings.categories_annonces')->with(['error' => 'Verifiez vos informations !!']);
    	}

    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $data = [];
        $data['category'] = CategoryAnnonces::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories_annonces')->with(['error'=>'cette categorie n\'existe pas']);
        }
        return view('admin.settings.categories_annonces.edit',$data);
    }

    
    public function update(CategoryRequest $request, $id)
    {
       
        $data = [];
        $data['category'] = CategoryAnnonces::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories_annonces')->with(['error'=>'cette categorie n\'existe pas']);
        }
        $slug = Str::slug($request->name);
        $data['category']->update([
            'name' => $request->name,
            'slug' => $slug,
            'category_compte' => $request->category_compte,
        ]);
        if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $data['category']->update([
                    'image' => $file_name,
                ]);
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('Category/'.$data['category']->id),$imageName);

            }

        return redirect()->route('admin.settings.categories_annonces')->with(['success' => 'La categorie est modifiée avec success']);

    }

   
    public function destroy($id)
    {
        $data = [];
        $data['category'] = CategoryAnnonces::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories_annonces')->with(['error'=>'cette categorie n\'existe pas']);
        }
        $data['category']->delete();

        return redirect()->route('admin.settings.categories_annonces')->with(['success' => 'La categorie est supprimée avec success']);

    }
}
