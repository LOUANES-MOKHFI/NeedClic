<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DetailsUser;
use App\Models\Roles;
class DashboardController extends Controller
{
    public function index(){
        $data = [];
        $data['particuliers'] = User::where('is_active',1)->where('type_compte',0)->get();
        $data['artisanats'] = User::where('is_active',1)->where('type_compte',1)->get();

        $data['detailsArt'] = DetailsUser::where('type_compte_proff','Artisan')->pluck('user_id');
        $data['detailsIng'] = DetailsUser::where('type_compte_proff','Ingénieure')->pluck('user_id');
        
        $data['proffsArt'] = User::where('type_compte',2)->where('is_active',1)->whereIn('id',$data['detailsArt'])->get(); 
        $data['proffsIng'] = User::where('type_compte',2)->where('is_active',1)->whereIn('id',$data['detailsIng'])->get(); 


        $data['boutiques'] = User::where('is_active',1)->where('type_compte',3)->get();


    	return view('admin.index',$data);
    }
}
