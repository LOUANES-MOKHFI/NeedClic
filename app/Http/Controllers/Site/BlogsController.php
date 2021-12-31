<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\CategoryBlogs;
use App\Models\Publicite;
class BlogsController extends Controller
{
    public function index()
    {
    	$data = [];
        $data['blogs'] = Blogs::orderBy('id','DESC')->active()->paginate(12); 
    	$data['newsBlogs'] = Blogs::orderBy('id','DESC')->limit(4)->get(); 
    	$data['categories'] = CategoryBlogs::all();
        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
        return view('users.blog.index',$data);
    }

    public function show($uuid){
    	$data = [];
    	$data['blog'] = Blogs::where('uuid',$uuid)->where('status',1)->first();
    	$data['categories'] = CategoryBlogs::all();
        $data['newsBlogs'] = Blogs::orderBy('id','DESC')->limit(4)->get(); 

        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
    	if(!$data['blog']){
    		return redirect()->back()->with(['error',"Cette blog n'existe pas"]);
    	}

    	return view('users.blog.show',$data);

    }

    public function search(Request $request){
    	$data = [];
    	$data['title'] = $request->title;

    	$data['blogs'] = Blogs::where('titre','Like','%'.$data['title'].'%')->where('status',1)->paginate(18); 
        $data['newsBlogs'] = Blogs::orderBy('id','DESC')->limit(4)->get(); 
    	$data['categories'] = CategoryBlogs::all();
        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
    	return view('users.blog.index',$data);

    }

    public function BlogByCategory($slug){

        $data['categories'] = CategoryBlogs::all();
        $data['category'] = CategoryBlogs::where('slug',$slug)->first();
        $data['blogs'] = Blogs::where('category_id',$data['category']->id)->where('status',1)->paginate(12); 
        $data['newsBlogs'] = Blogs::orderBy('id','DESC')->limit(4)->get(); 
        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
        return view('users.blog.index',$data);

    }
}
