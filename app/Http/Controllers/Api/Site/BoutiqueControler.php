<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonces;
use App\Models\User;
use App\Models\AccountRating;
use App\Models\DetailsUser;
use App\Models\Wilaya;
use App\Models\CategoryAnnonces;
use App\Http\Resources\AccountRating as RatingRessource;
class BoutiqueControler extends Controller
{
    public function index($uuid){
    	$data = [];
    	$data['user'] = User::where('is_active',1)->where('uuid',$uuid)->first();
        if(!$data['user']){
            $data['status'] = 500;
            $data['msg'] = "ce membre n'existe pas";
            return response()->json($data);

        }
    	$data['detail'] = DetailsUser::where('user_id',$data['user']->id)->first();
    	
        //$data['annonces'] = Annonces::where('user_id',$data['user']->id)->where('status',1)->first();
        $data['status'] = 200;
        $data['msg'] = "";
        return response()->json($data);
        
    }

    public function getRating($id){
    	$data = [];
    	$data['rating'] = AccountRating::where('user_id',$id)->get();
    	 $data['status'] = 200;
    	return response()->json($data);
    }
}
