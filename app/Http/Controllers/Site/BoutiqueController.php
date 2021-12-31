<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonces;
use App\Models\User;
use App\Models\AccountRating;
use App\Models\DetailsUser;
use App\Models\Wilaya;
use App\Models\CategoryAnnonces;
use App\Http\Resources\AccountRating as RatingRessource;
use App\Models\Publicite;
use App\Models\UserLikes;
use Auth;


class BoutiqueController extends Controller
{
    public function index($uuid){
    	$data = [];
    	$data['user'] = User::where('is_active',1)->where('uuid',$uuid)->first();
    	$data['detail'] = DetailsUser::where('user_id',$data['user']->id)->first();
    	
        if(Auth::user()){
        $data['usersLike'] = UserLikes::where('user_id',Auth::user()->id)->where('is_like',1)->pluck('annonce_id')->toArray();
        $data['usersReviews'] = AccountRating::where('reviews_user_id',Auth::user()->id)->where('user_id',$data['user']->id)->first();
        }
        
        //$data['annonces'] = Annonces::where('user_id',$data['user']->id)->where('status',1)->first();
        $data['pubs'] = Publicite::where('in_home',4)->where('image',
            '<>',null)->get();
    	return view('users.boutique.index',$data);
    }

    public function setRating(Request $request){
        $user = User::where('uuid',$request->compte_uuid)->first();
    	$user_reviews = User::where('uuid',$request->user_review_uuid)->first();
        $lastRating = AccountRating::where('user_id',$user->id)->where('reviews_user_id',$user_reviews->id)->first();
    	if(!$user){
    		$data = [];
    		$data['status'] = 500;
    		$data['msg'] = "ce membre n'existe pas";
    		return response()->json($data);
    	}
        if($lastRating){
            $lastRating->update([
                'rating'  => $request->get('rating'),
            ]);
        }else{
        	$rating = AccountRating::create([
                'user_id' => $user->id,
        		'reviews_user_id' => $user_reviews->id,
        		'rating'  => $request->get('rating'),
        	]);
        }

    	$data['rating'] = AccountRating::where('user_id',$user->id)->get();
    	$sum = 0;
        $rating = $data['rating'];
        $totalUser = count($data['rating']);
        for($i=0;$i<$totalUser;$i++){
            $sum += floatval($rating[$i]['rating']);
        }
        $avg = $sum/$totalUser;
        $data['totalRate'] = number_format($avg,1,'.','');
        $user->avg_rating = $data['totalRate'];
        $user->save();
    }

    public function getRating($id){
    	$data = [];
    	$data['rating'] = AccountRating::where('user_id',$id)->get();
    	return response()->json($data);
    }


}
