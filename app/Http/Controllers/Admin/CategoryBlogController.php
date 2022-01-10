<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryBlogs;
use App\Http\Requests\Admin\CategoryRequest;
use Uuid;
use Str;
class CategoryBlogController extends Controller
{
    public function index()
    {
        $data=[];
        $data['categories'] = CategoryBlogs::all();
        return view('admin.settings.categories_blogs.index',$data);
    }

   
    public function create()
    {
        return view('admin.settings.categories_blogs.add');
    }

   
    public function store(CategoryRequest $request)
    {	
    	
    	try {
            if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $slug = Str::slug($request->name);
        		$category = CategoryBlogs::create([
            	'name' => $request->name,
                'slug' => $slug,
                'image'=> $file_name,
            	]);
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('BlogCategories/'.$category->name),$imageName);
            }
        	return redirect()->route('admin.settings.categories_blogs')->with(['success' => 'La categorie est ajoutée avec success']);
    	} catch (Exception $e) {
    		return redirect()->route('admin.settings.categories_blogs')->with(['error' => 'Verifiez vos informations !!']);
    	}

    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $data = [];
        $data['category'] = CategoryBlogs::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories_blogs')->with(['error'=>'cette categorie n\'existe pas']);
        }
        return view('admin.settings.categories_blogs.edit',$data);
    }

    
    public function update(CategoryRequest $request, $id)
    {
        $data = [];
        $data['category'] = CategoryBlogs::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories_blogs')->with(['error'=>'cette categorie n\'existe pas']);
        }
        $slug = Str::slug($request->name);
        $data['category']->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);
        if($request->hasFile('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $data['category']->update([
                    'image' => $file_name,
                ]);
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('BlogCategories/'.$data['category']->name),$imageName);
            }


        return redirect()->route('admin.settings.categories_blogs')->with(['success' => 'La categorie est modifiée avec success']);

    }

   
    public function destroy($id)
    {
        $data = [];
        $data['category'] = CategoryBlogs::where('id',$id)->first();
        if(!$data['category']){
            return redirect()->route('admin.settings.categories_blogs')->with(['error'=>'cette categorie n\'existe pas']);
        }
        $data['category']->delete();

        return redirect()->route('admin.settings.categories_blogs')->with(['success' => 'La categorie est supprimée avec success']);

    }
}
