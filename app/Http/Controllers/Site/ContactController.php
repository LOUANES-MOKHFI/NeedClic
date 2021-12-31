<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Site\ContactRequest;
use App\Models\Contact;
use App\Models\Publicite;
class ContactController extends Controller
{
    public function index()
    {
        $data = [];
        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
        return view('users.contact.index',$data);
    }
    public function store(ContactRequest $request){
    	try {
    		$contact = Contact::create([
    			'name' => $request->name,
    			'email' => $request->email,
    			'subject' => $request->subject,
    			'comments' => $request->comments,
    		]);
    		return redirect()->back()->with(['success'=>'Votre message a étè bien envoyée']);

    	} catch (Exception $e) {
    		return redirect()->back()->with(['error'=>'erreur de systeme,veuillez essayez plus tard']);
    	}
    }
}
