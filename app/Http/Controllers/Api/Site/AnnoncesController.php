<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonces;
use App\Models\Wilaya;
use App\Models\User;
use App\Models\Commune;
use App\Models\Service;
use App\Models\DetailsUser;
use App\Models\AttachementsAnnonce;
use App\Models\CategoryAnnonces;
use DB;
		
class AnnoncesController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['annonces'] = Annonces::where('status',1)->paginate(9); 
    	$data['newsAnnonces'] = Annonces::where('status',1)->orderBy('id','DESC')->limit(4)->get(); 
    	$data['categories'] = CategoryAnnonces::all();
    	$data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
    	$data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);
    }

    public function show($uuid){
    	$data = [];
        $data['annonce'] = Annonces::where('uuid',$uuid)->where('status',1)->first();
        if(!$data['annonce']){
	    	$data['status'] = 500;
	    	$data['msg'] = "Cette annonce n'existe pas"
	    	return response()->json($data);
        }
        
    	$data['attachements'] = AttachementsAnnonce::where('annonce_id',$data['annonce']->id)->get();
        $data['annonce']->count_viewed = $data['annonce']->count_viewed+1;
        $data['annonce']->save(); 
    	$data['categories'] = CategoryAnnonces::all();
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['annoncesCats'] = Annonces::where('category_id',$data['annonce']->category_id)->where('status',1)->orderBy('id','DESC')->limit(4)->get();
    	$data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
    	$data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);
    }

    public function search(Request $request){
    	$data = [];
    	$data['title'] = $request->title;

    	$data['annonces'] = Annonces::where('titre','Like','%'.$data['title'].'%')->where('status',1)->paginate(8); 
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
    	$data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();
    	$data['wilayas'] = Wilaya::all();
    	$data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);
    }

     public function getAllCategory($type){
		$data=[];

        $data['categories'] = CategoryAnnonces::all();
        $data['type'] = $type;
        $data['wilayas'] = Wilaya::all();
    	$data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);

    }

    public function ProffByCategory($slug,$type){

        if($type == 'Particulier'){
            $type_compte = 0;
        }elseif($type == 'Artisanat'){
            $type_compte = 1;
        }else{
            $type_compte = 2;
        }
        $data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();
        $data['category'] = CategoryAnnonces::where('slug',$slug)->first();
        if($type_compte == 2){
            $data['details'] = DetailsUser::where('type_compte_proff',$type)->pluck('user_id');
            $data['users'] = User::where('type_compte',$type_compte)->where('category_id',$data['category']->id)->where('is_active',1)->whereIn('id',$data['details'])->paginate(8); 
        }else{
            $data['users'] = User::where('type_compte',$type_compte)->where('category_id',$data['category']->id)->where('is_active',1)->paginate(8); 
        }
        

        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
    	$data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
    	$data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);

    }
   
    
    public function BoutiqueByService($slug){
    	$data = [];
        $data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();

        $data['service'] = Service::where('slug',$slug)->first();
        if(!$data['service']){
            return redirect()->back()->with(['error'=>'Ce service n\'exsite pas !!']);
        }
        $data['details'] = DetailsUser::where('service_id',$data['service']->id)->pluck('user_id');
        $data['users'] = User::where('type_compte',3)->whereIn('id',$data['details'])->where('is_active',1)->paginate(8); 

        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['wilayas'] = Wilaya::all();

        $data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);

    }
   

    public function ComptesFiltre(Request $request){
        $data['category_id'] = $request->category;
        $data['service_id'] = $request->service;
        $data['type_id'] = $request->type;
        $data['wilaya_id'] = $request->wilaya;
        $data['commune_id'] = $request->commune;

        $data['category'] = CategoryAnnonces::where('id',$data['category_id'])->first();
        $data['service'] = Service::where('id',$data['service_id'])->first();
        //$data['type'] = User::where('type_compte',$data['type_id'])->first();
        $data['wilaya'] = Wilaya::where('id',$data['wilaya_id'])->first();
        $data['commune'] = Commune::where('id',$data['commune_id'])->first();

        $users_type_ids = User::where('type_compte',$data['type_id'])->pluck('id');
        $users_category_ids = User::where('category_id',$data['category_id'])->pluck('id');
        $users_service_ids = DetailsUser::where('service_id',$data['service_id'])->pluck('user_id');
        //$users_type_wil_com_ids = User::where('type_compte',$data['type_id'])->where('wilaya_id',$data['wilaya_id'])->where('commune_id',$data['commune_id'])->pluck('id');
        $users_wil_com_ids = User::where('wilaya_id',$data['wilaya_id'])->where('commune_id',$data['commune_id'])->pluck('id');
       

        $data['newsAnnonces'] = Annonces::where('status',1)->orderBy('id','DESC')->limit(4)->get(); 
        $data['categories'] = CategoryAnnonces::all();
        $data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();

        if(!$data['type_id'] && !$data['wilaya_id']){
        	$data['status'] = 500;
	    	$data['msg'] = "veuillez selectionner au moin un filtre s\'ils vous plait !"
	    	return response()->json($data);
        }else
        if($data['type_id'] == 3){
            if($data['service_id'] && $data['wilaya_id']){
                $data['users'] = User::whereIn('id',$users_service_ids)
                ->whereIn('id',$users_wil_com_ids)
                ->paginate(9); 
                $data['status'] = 200;
		    	$data['msg'] = ""
		    	return response()->json($data);
            }
            $data['users'] = User::whereIn('id',$users_service_ids)
                ->paginate(9); 
                $data['status'] = 200;
		    	$data['msg'] = ""
		    	return response()->json($data);
        }else{
            if($data['category_id'] && $data['wilaya_id']){
                $data['users'] = User::whereIn('id',$users_category_ids)
                ->whereIn('id',$users_wil_com_ids)
                ->where('type_compte',$data['type_id'])
                ->paginate(9);
                $data['status'] = 200;
		    	$data['msg'] = ""
		    	return response()->json($data); 
            }
            $data['users'] = User::whereIn('id',$users_category_ids)
            ->where('type_compte',$data['type_id'])
                ->paginate(9);
                $data['status'] = 200;
		    	$data['msg'] = ""
		    	return response()->json($data); 
        }

    }

    public function LikeCompte($uuid){
        $data['user'] = User::where('uuid',$uuid)->first();
        $data['user']->count_like = $data['user']->count_like+1;
        $data['user']->save();
        $data['status'] = 200;
        return response()->json($data);

    }
}
