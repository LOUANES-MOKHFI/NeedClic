<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Wilaya;
use App\Models\User;
use App\Models\Service;
use App\Models\CategoryAnnonces;
use App\Models\CategoryBlogs;
class HomeControler extends Controller
{
    public function index()
    {
    	$data=[];
        $data['categoriesBlogs'] = CategoryBlogs::all();
        $data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();
        $data['wilayas'] = Wilaya::all();
        $data['users'] = User::where('is_active',1)->where('in_home',1)->where('image',
            '<>',null)->get();
        $data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);
    }

    public function getCommune($wilaya_id){
    	$data=[];
        $data['communes'] = Commune::where('wilaya_id',$wilaya_id)->get();
        $data['status'] = 200;
	    $data['msg'] = ""
	    return response()->json($data);
    }

}
