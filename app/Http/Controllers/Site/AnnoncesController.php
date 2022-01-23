<?php

namespace App\Http\Controllers\Site;

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
use App\Models\Publicite;
use App\Models\UserLikes;
use Auth;
class AnnoncesController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['annonces'] = Annonces::where('status',1)->paginate(16); 
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
    	$data['newsAnnonces'] = Annonces::where('status',1)->orderBy('id','DESC')->limit(4)->get(); 
    	$data['categories'] = CategoryAnnonces::all();
    	$data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        return view('users.annonce.index',$data);
    }

    public function show($uuid){
    	$data = [];
        $data['annonce'] = Annonces::where('uuid',$uuid)->where('status',1)->first();
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        if(!$data['annonce']){
            return redirect()->back()->with(['error',"Cette annonce n'existe pas"]);
        }
        
    	$data['attachements'] = AttachementsAnnonce::where('annonce_id',$data['annonce']->id)->get();
        $data['annonce']->count_viewed = $data['annonce']->count_viewed+1;
        $data['annonce']->save(); 
    	$data['categories'] = CategoryAnnonces::all();
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['annoncesCats'] = Annonces::where('category_id',$data['annonce']->category_id)->where('status',1)->orderBy('id','DESC')->limit(4)->get();
    	$data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
    	

    	return view('users.annonce.show',$data);

    }

    public function search(Request $request){
    	$data = [];
    	$data['title'] = $request->title;

    	$data['annonces'] = Annonces::where('titre','Like','%'.$data['title'].'%')->where('status',1)->paginate(16); 
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
    	$data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();
    	$data['wilayas'] = Wilaya::all();
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
    	return view('users.annonce.index',$data);
    }

    public function getAllCategory($type){

        if($type == 'Ingénieure'){
            $data['categories'] = CategoryAnnonces::where('category_compte',CAT_ING)->get();
        }elseif($type == 'Artisan'){
            $data['categories'] = CategoryAnnonces::where('category_compte',CAT_ART)->get();
        }elseif($type == 'Particulier'){
            $data['categories'] = CategoryAnnonces::where('category_compte',CAT_PART)->get();
        }elseif($type == 'Artisanat'){
            $data['categories'] = CategoryAnnonces::where('category_compte',CAT_ARTISANAT)->get();
        }
        
        $data['type'] = $type;
        $data['wilayas'] = Wilaya::all();
        $data['pubs'] = Publicite::where('in_home',2)->where('image',
            '<>',null)->get();
        return view('users.annonce.all_categories',$data);

    }

    public function GetAnnonceByCat($slug){

        $data=[];
        $data['categories'] = CategoryAnnonces::all();
        $data['category'] = CategoryAnnonces::where('slug',$slug)->first();
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        $data['users'] = User::where('type_compte',3)->pluck('id');
        $data['annonces'] = Annonces::where('category_id',$data['category']->id)
        ->whereNotIn('user_id',$data['users'])->where('status',1)->paginate(16); 
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        return view('users.annonce.index',$data);

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
            $data['users'] = User::where('type_compte',$type_compte)->where('category_id',$data['category']->id)->where('is_active',1)->whereIn('id',$data['details'])->paginate(16); 
        }else{
            $data['users'] = User::where('type_compte',$type_compte)->where('category_id',$data['category']->id)->where('is_active',1)->paginate(16); 
        }
        
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
    	$data['wilayas'] = Wilaya::all();
        $data['services'] = Service::all();
        $data['pubs'] = Publicite::where('in_home',4)->where('image',
            '<>',null)->get();
        return view('users.annonce.compte_in_category',$data);

    }
   
    
    public function BoutiqueByService($slug){

        $data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        $data['service'] = Service::where('slug',$slug)->first();
        if(!$data['service']){
            return redirect()->back()->with(['error'=>'Ce service n\'exsite pas !!']);
        }
        $data['details'] = DetailsUser::where('service_id',$data['service']->id)->pluck('user_id');
        $data['users'] = User::where('type_compte',3)->whereIn('id',$data['details'])->where('is_active',1)->paginate(16); 

        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['wilayas'] = Wilaya::all();
        $data['pubs'] = Publicite::where('in_home',4)->where('image',
            '<>',null)->get();
        return view('users.annonce.boutique_in_service',$data);

    }
    
    public function AnnonceBoutiqueByService($slug){
        $data = [];
        $data['service'] = Service::where('slug',$slug)->first();
        if(!$data['service']){
            return redirect()->back()->with(['error'=>'Ce service n\'exsite pas !!']);
        }
        $data['details'] = DetailsUser::where('service_id',$data['service']->id)->pluck('user_id');
        $data['usersId'] = User::where('type_compte',3)->whereIn('id',$data['details'])->where('is_active',1)->pluck('id'); 

        $data['annonces'] = Annonces::whereIn('user_id',$data['usersId'])->where('status',1)->paginate(16);
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['wilayas'] = Wilaya::all();
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        return view('users.annonce.index',$data);

    }

    public function AnnonceParticulierOrArtisanat($type){
        $data = [];
        if($type == 'Particulier'){
            $type_compte = 0;
        }elseif($type == 'Artisanat'){
            $type_compte = 1;
        }
        $data['type'] = $type;
        $data['usersId'] = User::where('type_compte',$type_compte)->where('is_active',1)->pluck('id'); 
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        $data['annonces'] = Annonces::whereIn('user_id',$data['usersId'])->where('status',1)->paginate(16);
        $data['newsAnnonces'] = Annonces::orderBy('id','DESC')->where('status',1)->limit(4)->get(); 
        $data['wilayas'] = Wilaya::all();
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        return view('users.annonce.index',$data);

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
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        if($data['type_id'] == 0){
            if($data['service_id'] && $data['wilaya_id']){
                $userID = DetailsUser::where('service_id',$data['service_id'])->pluck('user_id');
                //$userID = User::whereIn('id',$users_service_ids)
                //->whereIn('id',$users_wil_com_ids)
                //->pluck('id'); 
                $data['annonces'] = Annonces::whereIn('user_id',$userID)->where('status',1)->get();
                
                return view('users.annonce.filtre_annonces',$data);
            }
                $userID = DetailsUser::where('service_id',$data['service_id'])->pluck('user_id');

                //$userID = User::whereIn('id',$users_service_ids)->get(); 
                $data['annonces'] = Annonces::whereIn('user_id',$userID)->where('status',1)->get();
                return view('users.annonce.filtre_annonces',$data);
        }else{
            if($data['type_id'] == 2 || $data['type_id'] == 4){
                if($data['category_id'] && $data['wilaya_id']){
                     $data['users'] = User::whereIn('id',$users_category_ids)
                    ->whereIn('id',$users_wil_com_ids)
                    ->where('type_compte',$data['type_id'])
                    ->get(); 
                    return view('users.annonce.filter_boutique_in_service',$data);
                }
                $data['users'] = User::whereIn('id',$users_category_ids)
                ->where('type_compte',$data['type_id'])
                    ->get(); 
                return view('users.annonce.filter_boutique_in_service',$data);
            }else{
                if($data['type_id'] == 1){
                    if($data['category_id'] && $data['wilaya_id']){
                         $userID = User::whereIn('id',$users_wil_com_ids)
                        ->where('type_compte',$data['type_id'])
                        ->pluck('id'); 
                        $data['annonces'] = Annonces::whereIn('user_id',$userID)
                        ->where('category_id',$data['category_id'])->where('status',1)->get();
                        return view('users.annonce.filtre_annonces',$data);
                    }
                    $userID = User::where('type_compte',$data['type_id'])
                    ->pluck('id'); 
                    $data['annonces'] = Annonces::whereIn('user_id',$userID)
                    ->where('category_id',$data['category_id'])->where('status',1)->get();
                    return view('users.annonce.filtre_annonces',$data);


                }elseif($data['type_id'] == 3){
                     if($data['category_id'] && $data['wilaya_id']){
                            $userID = User::whereIn('id',$users_wil_com_ids)
                            ->where('type_compte',$data['type_id'])
                            ->where('category_id',$data['category_id'])
                            ->pluck('id'); 
                            $data['annonces'] = Annonces::whereIn('user_id',$userID)
                            ->where('status',1)->get();
                            return view('users.annonce.filtre_annonces',$data);
                        }
                    $userID = User::where('type_compte',$data['type_id'])
                    ->where('category_id',$data['category_id'])
                    ->pluck('id'); 
                    $data['annonces'] = Annonces::whereIn('user_id',$userID)
                    ->where('status',1)->get();
                     return view('users.annonce.filtre_annonces',$data);
                }
                
               
            }
            
        }

    }

    public function FilterBoutique(Request $request){
        $data= [];
        $data['service_id'] = $request->service;
        $data['wilaya_id'] = $request->wilaya;
        $data['commune_id'] = $request->commune;
        $data['keyword'] = $request->keyword;

        $data['wilaya'] = Wilaya::where('id',$data['wilaya_id'])->first();
        $data['commune'] = Commune::where('id',$data['commune_id'])->first();
        $data['service'] = Service::where('id',$data['service_id'])->first();
        $users_service_ids = DetailsUser::where('service_id',$data['service_id'])->pluck('user_id');
        $users_wil_ids = User::where('wilaya_id',$data['wilaya_id'])->pluck('id');
        $users_wil_com_ids = User::where('wilaya_id',$data['wilaya_id'])->where('commune_id',$data['commune_id'])->pluck('id');

        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }
        if(!$data['service_id'] && !$data['wilaya_id'] && !$data['commune_id'] && !$data['keyword']){
            $data['status'] = 501;
            $data['msg'] = "veuillez selectionner au moin un filtre";
            return view('users.annonce.filtre_annonces',$data);

        }else{
            if($data['service_id'] && $data['wilaya_id'] && $data['commune_id']){ 
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_service_ids)
                                    ->whereIn('user_id',$users_wil_com_ids)
                                    ->where('titre','Like','%'.$data['keyword'].'%')
                                    ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                $data['annonces'] = Annonces::whereIn('user_id',$users_service_ids)
                                    ->whereIn('user_id',$users_wil_com_ids)->get();
                $data['status'] = 200;
                return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['service_id'] && $data['wilaya_id']){ 
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_service_ids)
                                        ->whereIn('user_id',$users_wil_ids)
                                        ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                    
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_service_ids)
                                        ->whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['wilaya_id'] && $data['commune_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_com_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_com_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['wilaya_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['service_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_service_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                    
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_service_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
        }
    }
    public function FilterParticulier(Request $request){
        
        $data= [];
        $data['category_id'] = $request->category;
        $data['wilaya_id'] = $request->wilaya;
        $data['commune_id'] = $request->commune;
        $data['keyword'] = $request->keyword;

        $data['wilaya'] = Wilaya::where('id',$data['wilaya_id'])->first();
        $data['commune'] = Commune::where('id',$data['commune_id'])->first();
        $data['category'] = CategoryAnnonces::where('id',$data['category_id'])->first();
        //$users_service_ids = DetailsUser::where('service_id',$data['service_id'])->pluck('user_id');
        $users_wil_ids = User::where('wilaya_id',$data['wilaya_id'])->where('type_compte',0)->pluck('id');
        $users_wil_com_ids = User::where('wilaya_id',$data['wilaya_id'])->where('commune_id',$data['commune_id'])->where('type_compte',0)->pluck('id');
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }

        if(!$data['category_id'] && !$data['wilaya_id'] && !$data['commune_id'] && !$data['keyword']){
            $data['status'] = 501;
            $data['msg'] = "veuillez selectionner au moin un filtre";
            return view('users.annonce.filtre_annonces',$data);

        }else{
            if($data['category_id'] && $data['wilaya_id'] && $data['commune_id']){ 
                if($data['keyword']){
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                                ->whereIn('user_id',$users_wil_com_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                    ->whereIn('user_id',$users_wil_com_ids)->get();
                $data['status'] = 200;
                return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['category_id'] && $data['wilaya_id']){ 
                if($data['keyword']){
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                                ->where('titre','Like','%'.$data['keyword'].'%')
                                                ->whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                        ->whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['wilaya_id'] && $data['commune_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_com_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_com_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['wilaya_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['category_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
            }
        }
    }
    public function FilterArtisanat(Request $request){
        $data= [];
        $data['category_id'] = $request->category;
        $data['wilaya_id'] = $request->wilaya;
        $data['commune_id'] = $request->commune;
        $data['keyword'] = $request->keyword;


        $data['wilaya'] = Wilaya::where('id',$data['wilaya_id'])->first();
        $data['commune'] = Commune::where('id',$data['commune_id'])->first();
        $data['category'] = CategoryAnnonces::where('id',$data['category_id'])->first();
        //$users_service_ids = DetailsUser::where('service_id',$data['service_id'])->pluck('user_id');
        $users_wil_ids = User::where('wilaya_id',$data['wilaya_id'])->where('type_compte',1)->pluck('id');
        $users_wil_com_ids = User::where('wilaya_id',$data['wilaya_id'])->where('commune_id',$data['commune_id'])->where('type_compte',1)->pluck('id');
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }

        if(!$data['category_id'] && !$data['wilaya_id'] && !$data['commune_id'] && !$data['keyword']){
            $data['status'] = 501;
            $data['msg'] = "veuillez selectionner au moin un filtre";
            return view('users.annonce.filtre_annonces',$data);

        }else{
            if($data['category_id'] && $data['wilaya_id'] && $data['commune_id']){ 
                if($data['keyword']){
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                    ->whereIn('user_id',$users_wil_com_ids)
                                    ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                }
                $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                    ->whereIn('user_id',$users_wil_com_ids)->get();
                $data['status'] = 200;
                return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['category_id'] && $data['wilaya_id']){ 
                if($data['keyword']){
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                        ->whereIn('user_id',$users_wil_ids)
                                        ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                    
                }
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                        ->whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['wilaya_id'] && $data['commune_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_com_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                    
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_com_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['wilaya_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_ids)
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                    
                }
                    $data['annonces'] = Annonces::whereIn('user_id',$users_wil_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
            elseif($data['category_id']){
                if($data['keyword']){
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])
                                                ->where('titre','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
                    
                }
                    $data['annonces'] = Annonces::where('category_id',$data['category_id'])->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_annonces',$data);
            }
        }
    }       
    public function FilterIngenieur(Request $request){
        $data= [];
        $data['category_id'] = $request->category;
        $data['wilaya_id'] = $request->wilaya;
        $data['commune_id'] = $request->commune;
        $data['keyword'] = $request->keyword;

        $data['wilaya'] = Wilaya::where('id',$data['wilaya_id'])->first();
        $data['commune'] = Commune::where('id',$data['commune_id'])->first();
        $data['category'] = CategoryAnnonces::where('id',$data['category_id'])->first();
        $users_type_ids = DetailsUser::where('type_compte_proff','Ingénieure')->pluck('user_id');
        $users_wil_ids = User::where('wilaya_id',$data['wilaya_id'])->where('is_active',1)->pluck('id');
        $users_wil_com_ids = User::where('wilaya_id',$data['wilaya_id'])->where('is_active',1)->where('commune_id',$data['commune_id'])->pluck('id');

        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }

        if(!$data['category_id'] && !$data['wilaya_id'] && !$data['commune_id'] && !$data['keyword']){
            $data['status'] = 501;
            $data['msg'] = "veuillez selectionner au moin un filtre";
            return view('users.annonce.filtre_proffessionnel',$data);

        }else{
            if($data['category_id'] && $data['wilaya_id'] && $data['commune_id']){ 
                if($data['keyword']){

                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_com_ids)
                                    ->whereIn('id',$users_type_ids)
                                    ->where('name','Like','%'.$data['keyword'].'%')->get();
                $data['status'] = 200;
                return view('users.annonce.filtre_proffessionnel',$data); 
                }
                $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_com_ids)
                                    ->whereIn('id',$users_type_ids)->get();
                $data['status'] = 200;
                return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['category_id'] && $data['wilaya_id']){ 
                if($data['keyword']){
                    
                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_ids)
                                    ->whereIn('id',$users_type_ids)
                                    ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_ids)
                                    ->whereIn('id',$users_type_ids)
                                    ->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['wilaya_id'] && $data['commune_id']){
                if($data['keyword']){ 
                    $data['users'] = User::whereIn('id',$users_wil_com_ids)
                                          ->where('is_active',1)->whereIn('id',$users_type_ids)
                                          ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                    $data['users'] = User::whereIn('id',$users_wil_com_ids)->where('is_active',1)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['wilaya_id']){
                if($data['keyword']){
                    
                    $data['users'] = User::whereIn('id',$users_wil_ids)
                                        ->where('is_active',1)->whereIn('id',$users_type_ids)
                                        ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                    $data['users'] = User::whereIn('id',$users_wil_ids)->where('is_active',1)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['category_id']){
                if($data['keyword']){
                    $data['users'] = User::where('category_id',$data['category_id'])
                                        ->where('is_active',1)->whereIn('id',$users_type_ids)
                                        ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                    
                }
                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
        }
    }
    public function FilterArtisant(Request $request){

        $data= [];
        $data['category_id'] = $request->category;
        $data['wilaya_id'] = $request->wilaya;
        $data['commune_id'] = $request->commune;
        $data['keyword'] = $request->keyword;

        $data['wilaya'] = Wilaya::where('id',$data['wilaya_id'])->first();
        $data['commune'] = Commune::where('id',$data['commune_id'])->first();
        $data['category'] = CategoryAnnonces::where('id',$data['category_id'])->first();
        $users_type_ids = DetailsUser::where('type_compte_proff','Artisant')->pluck('user_id');

        $users_wil_ids = User::where('wilaya_id',$data['wilaya_id'])->where('is_active',1)->pluck('id');
        $users_wil_com_ids = User::where('wilaya_id',$data['wilaya_id'])->where('is_active',1)->where('commune_id',$data['commune_id'])->pluck('id');
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        }

        if(!$data['category_id'] && !$data['wilaya_id'] && !$data['commune_id'] && !$data['keyword']){
            $data['status'] = 501;
            $data['msg'] = "veuillez selectionner au moin un filtre";
            return view('users.annonce.filtre_proffessionnel',$data);

        }else{
            if($data['category_id'] && $data['wilaya_id'] && $data['commune_id']){ 
                if($data['keyword']){

                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_com_ids)
                                    ->whereIn('id',$users_type_ids)
                                    ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_com_ids)
                                    ->whereIn('id',$users_type_ids)->get();
                $data['status'] = 200;
                return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['category_id'] && $data['wilaya_id']){ 
                if($data['keyword']){
                    
                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_ids)->whereIn('id',$users_type_ids)
                                    ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)
                                    ->whereIn('id',$users_wil_ids)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['wilaya_id'] && $data['commune_id']){
                if($data['keyword']){
                    $data['users'] = User::whereIn('id',$users_wil_com_ids)
                                        ->where('is_active',1)->whereIn('id',$users_type_ids)
                                        ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                    
                }
                    $data['users'] = User::whereIn('id',$users_wil_com_ids)->where('is_active',1)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['wilaya_id']){
                if($data['keyword']){
                    
                    $data['users'] = User::whereIn('id',$users_wil_ids)
                                        ->where('is_active',1)->whereIn('id',$users_type_ids)
                                        ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                    $data['users'] = User::whereIn('id',$users_wil_ids)->where('is_active',1)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
            elseif($data['category_id']){
                if($data['keyword']){
                    
                    $data['users'] = User::where('category_id',$data['category_id'])
                                        ->where('is_active',1)->whereIn('id',$users_type_ids)
                                        ->where('name','Like','%'.$data['keyword'].'%')->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
                }
                    $data['users'] = User::where('category_id',$data['category_id'])->where('is_active',1)->whereIn('id',$users_type_ids)->get();
                    $data['status'] = 200;
                    return view('users.annonce.filtre_proffessionnel',$data);
            }
        }
    }
   


    public function LikeCompte($compte_uuid,$user_uuid,$annonce_id){
        
        $userLike = User::where('uuid',$user_uuid)->first();
        $compte = User::where('uuid',$compte_uuid)->first();
        $annonce = Annonces::where('id',$annonce_id)->first();
        $annonceLike = UserLikes::where('annonce_id',$annonce_id)->where('user_id',$userLike->id)->first();
        
        if($annonceLike){
           if($annonceLike->is_like == 1){
                $annonceLike->is_like = 0;
                $annonceLike->save();
                $compte->count_like = $compte->count_like-1;
                $compte->save();
                $data['status'] = 201;
                 return response()->json($data);
            }elseif($annonceLike->is_like == 0){
                $annonceLike->is_like = 1;
                $annonceLike->save();
                $data['status'] = 200;
                $compte->count_like = $compte->count_like+1;
                $compte->save();
                 return response()->json($data);
            }  
        }
        else{
            UserLikes::create([
                'user_id'   => $userLike->id,
                'compte_id' => $compte->id,
                'annonce_id'=> $annonce->id,
                'is_like'   => 1,
            ]);
            $data['status'] = 200;
            $compte->count_like = $compte->count_like+1;
            $compte->save();
             return response()->json($data);
        }
        


    }
}
