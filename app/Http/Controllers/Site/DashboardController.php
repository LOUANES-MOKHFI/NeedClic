<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonces;
use App\Models\CategoryAnnonces;
use App\Models\User;
use App\Models\AttachementsAnnonce;
use App\Http\Requests\Admin\AnnonceRequest;
use App\Http\Requests\Admin\AttachementsRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\DetailsUser;
use App\Models\Album;

use Uuid;
use Auth;
class DashboardController extends Controller
{
    public function index(){
        
        $id = Auth::user()->id;
        $data = [];
        $data['user'] = User::where('id',$id)->first();
        $data['detail'] = DetailsUser::where('user_id',$id)->first();
        $data['annonces'] = Annonces::where('user_id',$id)->get();
        $data['albums'] = Album::where('user_id',$id)->get();

    	return view('users.dashboard.index',$data);
    }
    public function annonces(){
    	$data=[];
        $data['annonces'] = Annonces::where('user_id',Auth::user()->id)->get();
    	return view('users.dashboard.annonces.index',$data);
    }

    public function create()
    {
        $data = [];
        $data['categories'] = CategoryAnnonces::all();
        $data['categoriesPart'] = CategoryAnnonces::where('category_compte',1)->get();
        return view('users.dashboard.annonces.add',$data);
    }

   
    public function store(AnnonceRequest $request)
    {   

       	$user = Auth::user();
        $detail = DetailsUser::where('user_id',$user->id)->first();
         try {	
            if($user->type_compte == 3){
               $annonce = Annonces::create([
                    'uuid' => Uuid::generate()->string,
                    'titre' => $request->titre,
                    'description'   => $request->description,
                    'category_id'   => $detail->service_id,
                    'is_negociable' => $request->is_negociable ? $request->is_negociable : 0 ,
                    'prix'          => $request->prix,
                    'status'        => 0,
                    'user_id'       => Auth::user()->id,
                ]); 
            }
            else{
        	$annonce = Annonces::create([
	                'uuid' => Uuid::generate()->string,
	                'titre' => $request->titre,
	                'description'   => $request->description,
	                'category_id'   => Auth::user()->type_compte == 0 ? $request->category_id : Auth::user()->category_id,
	                'is_negociable' => $request->is_negociable ? $request->is_negociable : 0 ,
	                'prix'		    => $request->prix,
	                'user_id'       => Auth::user()->id,
            	]);
                }
            if($request->hasFile('attachments')){
            	
                foreach ($request->attachments as $attachement) {
                	//return $attachement;
                    $image = $attachement;
                    $file_name = $image->getClientOriginalName();

                    $attachements = new AttachementsAnnonce();
                    $attachements->file_name = $file_name;
                    $attachements->user_id = $annonce->user_id;
                    $attachements->annonce_id  = $annonce->id;
                    $attachements->save();

                    ///Move Attachements
                    $imageName = $attachement->getClientOriginalName();
                    $attachement->move(public_path('Annonces/'.$annonce->titre),$imageName);
                }
            }
            return redirect()->route('users.dashboard')->with(['success' => "L'annonce a étè ajoutée avec success"]);
         } catch (Exception $e) {
             return redirect()->back()->with(['error' => 'Verifiez vos informations !!']);
         }

    }

    
    public function show($uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('users.dashboard')->with(['error'=>'cette annonce n\'existe pas']);
        }
        return view('users.dashboard.annonces.show',$data);
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['categories'] = CategoryAnnonces::all();
         $data['categoriesPart'] = CategoryAnnonces::where('category_compte',1)->get();
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('users.dashboard')->with(['error'=>'cette annonce n\'existe pas']);
        }
        return view('users.dashboard.annonces.edit',$data);
    }

    
    public function update(AnnonceRequest $request, $uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::isAnnonce($uuid)->where('user_id',Auth::user()->id)->first();
        if(!$data['annonce']){
            return redirect()->route('users.dashboard')->with(['error'=>'cette annonce n\'existe pas']);
        }
        	
            if(Auth::user()->type_compte == 3){
               $data['annonce']->update([
                    'titre'         => $request->titre,
                    'description'   => $request->description,
                    'category_id'   => $detail->service_id,
                    'is_negociable' => $request->is_negociable,
                    'prix'          => $request->prix,
                    'user_id'       => Auth::user()->id,
                ]); 
            }
            else{
            $data['annonce']->update([
                    'titre'         => $request->titre,
                    'description'   => $request->description,
                    'category_id'   => Auth::user()->type_compte == 0 ? $request->category_id : Auth::user()->category_id,
                    'is_negociable' => $request->is_negociable,
                    'prix'          => $request->prix,
                    'user_id'       => Auth::user()->id,
                ]);
                }
        
        return redirect()->back()->with(['success' => "l'annonce a étè modifiée avec success"]);

    }

   
    public function destroy($uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::where('uuid',$uuid)->first();
        if(!$data['annonce']){
            return redirect()->route('users.dashboard')->with(['error'=>'cette annonce n\'existe pas']);
        }
        $attachements = AttachementsAnnonce::where('annonce_id',$data['annonce']->id)->first();
        $data['annonce']->delete();

        return redirect()->route('users.dashboard')->with(['success' => "L'annonce a étè supprimée avec success"]);

    }

    public function deleteImage($id){
        $userId = Auth::user()->id;
        $data['attachement'] = AttachementsAnnonce::where('id',$id)->where('user_id',$userId)->first();
        if(!$data['attachement']){
            return redirect()->back()->with(['error'=>'cette image n\'existe pas']);
        }
        $annonce = Annonces::where('id',$data['attachement']->annonce_id)->where('user_id',$userId)->first();
        if(!$annonce){
            return redirect()->back()->with(['error'=>'cette annonce n\'existe pas']);
        }
        $data['attachement']->delete();
        Storage::disk('annonces')->delete($annonce->titre.'/'.$data['attachement']->file_name);

        return redirect()->back()->with(['success' => "L'image a étè supprimée avec success"]);
    }


    public function storeAttachements(AttachementsRequest $request){
        $userId = $request->user_id;
        $annonceId = $request->annonce_id;
        $annonce = Annonces::where('id',$annonceId)->where('user_id',$userId)->first();

        if(!$annonce){
            return redirect()->back()->with(['error'=>'cette annonce n\'existe pas']);
        }
        if($request->attachments){  
            foreach ($request->attachments as $attachement) {
                    //return $attachement;
                    $image = $attachement;
                    $file_name = $image->getClientOriginalName();

                    $attachements = new AttachementsAnnonce();
                    $attachements->file_name = $file_name;
                    $attachements->user_id = $userId;
                    $attachements->annonce_id  = $annonceId;
                    $attachements->save();

                    ///Move Attachements
                    $imageName = $attachement->getClientOriginalName();
                    $attachement->move(public_path('Annonces/'.$annonce->titre),$imageName);
                }
        return redirect()->back()->with(['success' => "L'image a étè ajouter avec success"]);

        }


    }

}
