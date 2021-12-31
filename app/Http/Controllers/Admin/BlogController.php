<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\CategoryBlogs;
use App\Models\BlogAttachements;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BlogRequest;
use Uuid;

class BlogController extends Controller
{
     public function index()
    {
        $data=[];
        $data['blogs'] = Blogs::orderBy('id','DESC')->get();
        return view('admin.blogs.index',$data);
    }

   
    public function create()
    {
        $data = [];
        $data['categories'] = CategoryBlogs::all();
        return view('admin.blogs.add',$data);
    }

   
    public function store(BlogRequest $request)
    {   

        
         try {

                if(!$request->has('status')){
                	$request->status = 0;
                }else{
                	$request->status = 1;
                }
                $blog = Blogs::create([
	                'uuid' => Uuid::generate()->string,
	                'titre' => $request->titre,
	                'description' => $request->description,
	                'status' => $request->status,
	                'image'=> null,
	                'category_id' => $request->category_id,
	                'admin_id'    => auth('admins')->user()->id,
            	]);
                
            
            if($request->hasFile('attachments')){
                //return $request->attachments;
                foreach ($request->attachments as $attachement) {
                    //return $attachement;
                    $image = $attachement;
                    $file_name = $image->getClientOriginalName();

                    $attachements = new BlogAttachements();
                    $attachements->file_name = $file_name;
                    $attachements->user_id = auth('admins')->user()->id;
                    $attachements->blog_id  = $blog->id;
                    $attachements->save();

                    ///Move Attachements
                    $imageName = $attachement->getClientOriginalName();
                    $attachement->move(public_path('Blog/'.$blog->titre),$imageName);
                }
            }
            return redirect()->route('admin.blogs')->with(['success' => "Le blog a étè ajoutée avec success"]);
        } catch (Exception $e) {
            return redirect()->route('admin.blogs')->with(['error' => 'Verifiez vos informations !!']);
        }

    }

    
    public function show($uuid)
    {
        $data = [];
        $data['blog'] = Blogs::isBlog($uuid)->first();
        if(!$data['blog']){
            return redirect()->route('admin.blogs')->with(['error'=>'cette blog n\'existe pas']);
        }
        return view('admin.blogs.show',$data);
    }

    
    public function edit($uuid)
    {
       $data = [];
        $data['categories'] = CategoryBlogs::all();
        $data['blog'] = Blogs::isBlog($uuid)->first();
        if(!$data['blog']){
            return redirect()->route('admin.blogs')->with(['error'=>'cette blog n\'existe pas']);
        }
        return view('admin.blogs.edit',$data);
    }

    
    public function update(BlogRequest $request, $uuid)
    {
        $data = [];
        $data['blog'] = Blogs::isBlog($uuid)->first();
        if(!$data['blog']){
            return redirect()->route('admin.blogs')->with(['error'=>'cette blog n\'existe pas']);
        }

        if(!$request->has('status')){
        	$request->status = 0;
        }else{
        	$request->status = 1;
        }
        
        $data['blog']->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'admin_id'    => auth('admins')->user()->id,
    	]);

        return redirect()->route('admin.blogs')->with(['success' => "cette blog a étè modifiée avec success"]);

    }

   
    public function destroy($uuid)
    {
        $data = [];
        $data['blog'] = Blogs::where('uuid',$uuid)->first();
        if(!$data['blog']){
            return redirect()->route('admin.blogs')->with(['error'=>'cette blog n\'existe pas']);
        }
        //Storage::disk('public_uploads')->deleteDirectory($data['blog']->titre);
        $data['blog']->delete();

        return redirect()->route('admin.blogs')->with(['success' => "Le blog a étè supprimée avec success"]);

    }

    public function deleteImage($id){

        $data['attachement'] = BlogAttachements::where('id',$id)->first();
        if(!$data['attachement']){
            return redirect()->back()->with(['error'=>'cette image n\'existe pas']);
        }
        $blog = Blogs::where('id',$data['attachement']->blog_id)->first();
        if(!$blog){
            return redirect()->back()->with(['error'=>'cette blog n\'existe pas']);
        }
        $data['attachement']->delete();
        Storage::disk('blogs')->delete($blog->titre.'/'.$data['attachement']->file_name);

        return redirect()->back()->with(['success' => "L'image a étè supprimée avec success"]);
    }


    public function storeAttachements(Request $request){
        $userId = auth('admins')->user()->id;
        $blogId = $request->blog_id;
        $blog = Blogs::where('id',$blogId)->first();

        if(!$blog){
            return redirect()->back()->with(['error'=>'cette blog n\'existe pas']);
        }
        if($request->attachments){  
            foreach ($request->attachments as $attachement) {
                    //return $attachement;
                    $image = $attachement;
                    $file_name = $image->getClientOriginalName();

                    $attachements = new BlogAttachements();
                    $attachements->file_name = $file_name;
                    $attachements->user_id = $userId;
                    $attachements->blog_id  = $blogId;
                    $attachements->save();

                    ///Move Attachements
                    $imageName = $attachement->getClientOriginalName();
                    $attachement->move(public_path('Blog/'.$blog->titre),$imageName);
                }
        return redirect()->back()->with(['success' => "L'image a étè ajouter avec success"]);

        }


    }
}
