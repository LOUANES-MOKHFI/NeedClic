<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonces;
use App\Models\CategoryAnnonces;
use App\Models\AttachementsAnnonce;
use App\Http\Requests\Admin\AnnonceRequest;
use Illuminate\Support\Facades\Mail;

use Uuid;

class AnnonceController extends Controller
{
    public function index()
    {
        $data=[];
        $data['annonces'] = Annonces::orderBy('id','DESC')->get();
        return view('admin.annonces.index',$data);
    }

   
    public function create()
    {
        $data = [];
        $data['categories'] = CategoryAnnonces::all();
        return view('admin.annonces.add',$data);
    }

   
    public function store(AnnonceRequest $request)
    {   	
    	
         //return $request;
         try {
	    	
        	$annonce = Annonces::create([
	                'uuid' => Uuid::generate()->string,
	                'titre' => $request->titre,
	                'description' => $request->description,
	                'category_id' => $request->category_id,
	                'is_negociable' => $request->is_negociable,
	                'prix'		    => $request->prix,
	                'user_id'       => 1,
            	]);

            if($request->hasFile('attachments')){
                foreach ($request->attachments as $attachement) {
                    $image = $request->file('attachement');
                    $file_name = $image->getClientOriginalName();

                    $attachements = new AttachementsAnnonce();
                    $attachements->file_name = $file_name;
                    $attachements->user_id = 1;
                    $attachements->annonce_id  = $annonce->id;
                    $attachements->save();

                    ///Move Attachements
                    $imageName = $request->attachement->getClientOriginalName();
                    $request->attachement->move(public_path('Annonces/'.$annonce->titre),$imageName);
                }
            }
            return redirect()->route('admin.annonces')->with(['success' => "L'annonce a étè ajoutée avec success"]);
         } catch (Exception $e) {
             return redirect()->route('admin.annonces')->with(['error' => 'Verifiez vos informations !!']);
         }

    }

    
    public function show($uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('admin.annonces')->with(['error'=>'cette annonce n\'existe pas']);
        }

        return view('admin.annonces.show',$data);
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['categories'] = CategoryAnnonces::all();
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('admin.annonces')->with(['error'=>'cette annonce n\'existe pas']);
        }
        return view('admin.annonces.edit',$data);
    }

    
    public function update(AnnonceRequest $request, $uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('admin.annonces')->with(['error'=>'cette annonce n\'existe pas']);
        }
        	
	        if(!$request->has('is_negociable')){
	        	$request->is_negociable = 0;
	        }else{
	        	$request->is_negociable = 1;
	        }
        	$data['annonce']->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'is_negociable' => $request->is_negociable,
                'prix'		    => $request->prix,
                'user_id'       => Auth::user()->id,
            	]);
        
        return redirect()->route('admin.annonces')->with(['success' => "cette annonce a étè modifiée avec success"]);

    }

   
    public function destroy($uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::where('uuid',$uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('admin.annonces')->with(['error'=>'cette annonce n\'existe pas']);
        }
        $attachements = AttachementsAnnonce::where('annonce_id',$data['annonce']->id)->first();
        $data['annonce']->delete();

        return redirect()->route('admin.annonces')->with(['success' => "L'annonce a étè supprimée avec success"]);

    }


    public function Approuver($uuid){
    	$data['annonce'] = Annonces::where('uuid',$uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('admin.annonces')->with(['error'=>'cette annonce n\'existe pas']);
        }
        $status = $data['annonce']->status == 0 ? 1 : 0 ;
         // return $status;
        $data['annonce']->status = $status;
        $name = $data['annonce']->user->name;
        $email = $data['annonce']->user->email;
        $this->sendMail($name,$email);
        $data['annonce']->save();
        
        return redirect()->back()->with(['success' => "Le status de l'annonce a étè changer avec success"]);

    }

    public function deleteImage($id){
        $data['attachement'] = AttachementsAnnonce::where('id',$id)->first();
        if(!$data['attachement']){
            return redirect()->back()->with(['error'=>'cette image n\'existe pas']);
        }
        $data['attachement']->delete();
        return redirect()->back()->with(['success' => "L'image a étè supprimée avec success"]);

    }

    public function sendMail($to_name,$to_email){

        $data = array('name'=>$to_name, "header" => "
             Votre Annonce dans la plateform NeedClic est accepté,",
            "lien" => "www.needclic.com/fr",
            );
            Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('NeedClic');
            $message->from('contact@needclic.com','NeedClic');
            });
    }
}
