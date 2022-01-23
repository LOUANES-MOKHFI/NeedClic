<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Wilaya;
use App\Models\User;
use App\Models\Service;
use App\Models\Publicite;
use App\Models\CategoryAnnonces;
use App\Models\CategoryBlogs;
use App\Models\ImageCompte;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['categoriesBlogs'] = CategoryBlogs::all();
        $data['artisant'] = ImageCompte::where('id',1)->first();
        $data['ingenieur'] = ImageCompte::where('id',2)->first();
        $data['particulier'] = ImageCompte::where('id',3)->first();
        $data['artisanat'] = ImageCompte::where('id',4)->first();
        
        $data['categories'] = CategoryAnnonces::all();
        $data['services'] = Service::all();
        $data['wilayas'] = Wilaya::all();
        $data['users'] = User::where('is_active',1)->where('in_home',1)->where('image',
            '<>',null)->get();
        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
        $data['pubsbas'] = Publicite::where('in_home',5)->where('image',
            '<>',null)->get();
        return view('users.home.index',$data);
    }

    public function getCommune($wilaya_id){
        $communes = Commune::where('wilaya_id',$wilaya_id)->get();
        return response()->json($communes);
    }

    public function getCategory($type){
        $categories = CategoryAnnonces::where('category_compte',$type)->get();
        return response()->json($categories);
    }
    

    public function register_particulier()
    {
        return view('auth.registerParticulier');
    }
    public function register_ingenieur()
    {
        return view('auth.registerIng');
    }
    public function register_artisant()
    {
        return view('auth.registerArt');
    }
    public function register_artisanat()
    {
        return view('auth.registerArtisanat');
    }

    public function register_clients()
    {
       
        return view('auth.register_client');
    }


    
}
