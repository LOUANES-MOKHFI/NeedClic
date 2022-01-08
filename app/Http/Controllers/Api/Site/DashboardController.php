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
        $data['status'] = 200;
        $data['msg'] = ;
        return response()->json($data);
    }
    public function annonces(){
    	$data=[];
        $data['annonces'] = Annonces::where('user_id',Auth::user()->id)->get();
        $data['status'] = 200;
        $data['msg'] = ;
        return response()->json($data);
    }

    public function create()
    {
        $data = [];
        $data['categories'] = CategoryAnnonces::all();
        $data['categoriesPart'] = CategoryAnnonces::where('category_compte',1)->get();
        $data['status'] = 200;
        $data['msg'] = ;
        return response()->json($data);
    }

   
    public function store(AnnonceRequest $request)
    {   
        $data = [];
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
            $data['status'] = 200;
            $data['msg'] =  "L'annonce a étè ajoutée avec success";
            return response()->json($data);
         } catch (Exception $e) {
            $data['status'] = 500;
            $data['msg'] =  "Verifiez vos informations !!";
            return response()->json($data);
         }

    }

    
    public function show($uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            $data['status'] = 500;
            $data['msg'] =  'cette annonce n\'existe pas';
            return response()->json($data);
        }
        $data['status'] = 200;
        $data['msg'] =  "";
        return response()->json($data);
    }

    
    public function edit($uuid)
    {
        $data = [];
        $data['categories'] = CategoryAnnonces::all();
         $data['categoriesPart'] = CategoryAnnonces::where('category_compte',1)->get();
        $data['annonce'] = Annonces::isAnnonce($uuid)->first();
        if(!$data['annonce']){
            $data['status'] = 500;
            $data['msg'] = 'cette annonce n\'existe pas';
            return response()->json($data);
        }
            $data['status'] = 200;
            $data['msg'] =  "";
            return response()->json($data);
    }

    
    public function update(AnnonceRequest $request, $uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::isAnnonce($uuid)->where('user_id',Auth::user()->id)->first();
        if(!$data['annonce']){
            $data['status'] = 500;
            $data['msg'] = 'cette annonce n\'existe pas';
            return response()->json($data);
        }
        	
            if(Auth::user()->type_compte == 3){
               $data['annonce']->update([
                    'titre'         => $request->titre,
                    'description'   => $request->description,
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
            $data['status'] = 200;
            $data['msg'] =  "l'annonce a étè modifiée avec success";
            return response()->json($data);

    }

   
    public function destroy($uuid)
    {
        $data = [];
        $data['annonce'] = Annonces::where('uuid',$uuid)->first();
        if(!$data['annonce']){
            $data['status'] = 500;
            $data['msg'] = 'cette annonce n\'existe pas';
            return response()->json($data);
        }
        $attachements = AttachementsAnnonce::where('annonce_id',$data['annonce']->id)->first();
        $data['annonce']->delete();
        
        $data['status'] = 200;
        $data['msg'] =  "l'annonce a étè supprimée avec success";
        return response()->json($data);

    }

    public function deleteImage($id){
        $data = [];
        $userId = Auth::user()->id;
        $data['attachement'] = AttachementsAnnonce::where('id',$id)->where('user_id',$userId)->first();
        if(!$data['attachement']){
            $data['status'] = 500;
            $data['msg'] = 'cette image n\'existe pas';
            return response()->json($data);
        }
        $annonce = Annonces::where('id',$data['attachement']->annonce_id)->where('user_id',$userId)->first();
        if(!$annonce){
            $data['status'] = 500;
            $data['msg'] = 'cette image n\'existe pas';
            return response()->json($data);
        }
        $data['attachement']->delete();
        Storage::disk('annonces')->delete($annonce->titre.'/'.$data['attachement']->file_name);

        $data['status'] = 200;
        $data['msg'] =  "L'image a étè supprimée avec success";
        return response()->json($data);

    }


    public function storeAttachements(AttachementsRequest $request){
        $userId = $request->user_id;
        $annonceId = $request->annonce_id;
        $annonce = Annonces::where('id',$annonceId)->where('user_id',$userId)->first();

        if(!$annonce){
            $data['status'] = 500;
            $data['msg'] = 'cette annonce n\'existe pas';
            return response()->json($data);
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
        $data['status'] = 200;
        $data['msg'] =  "L'image a étè ajoutée avec success";
        return response()->json($data);

        }


    }

}
