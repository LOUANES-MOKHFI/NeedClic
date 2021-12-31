<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
    	$data = [];
    	$data['messages'] = Contact::orderBy('id','DESC')->get(); 
    	return view('admin.contact.index',$data);
    }

    public function show($id){
    	$data= [];
    	$data['msg'] = Contact::where('id',$id)->first();
    	$data['msg']->viewed = 1;
    	$data['msg']->save();
    	return view('admin.contact.show',$data);

    }

    public function destroy($id){
    	$data= [];
    	$data['msg'] = Contact::where('id',$id)->first();
    	if(!$data['msg']){
    		return redirect()->route('admin.contact')->with(['error'=> "Ce message n'existe pas"]);
    	}
    	$data['msg']->delete();
    	return redirect()->route('admin.contact')->with(['success'=> "Le message a étè bien supprimée"]);
    }
}
