<?php 



define('PAGINATE_COUNT',15);
define('CAT_PART',1);
define('CAT_ART',2);
define('CAT_ARTISANAT',3);
define('CAT_ING',4);


        
        

function artisant(){
     return App\Models\ImageCompte::where('id',1)->first();
 }
function ingenieur(){
     return App\Models\ImageCompte::where('id',2)->first();
 }
function particulier(){
     return App\Models\ImageCompte::where('id',3)->first();
 }
function artisanat(){
     return App\Models\ImageCompte::where('id',4)->first();
 }   

function Wilayas(){
     return App\Models\Wilaya::all();
 }

function Publicites(){
     return App\Models\Publicite::where('in_home',1)->where('image','<>',null)->get();
 }
 
 function CategoriesArt(){
     return App\Models\CategoryAnnonces::where('category_compte',CAT_ART)->get();
 }
 function CategoriesArtisanat(){
     return App\Models\CategoryAnnonces::where('category_compte',CAT_ARTISANAT)->get();
 }
 function CategoriesPart(){
     return App\Models\CategoryAnnonces::where('category_compte',CAT_PART)->get();
 }
 function CategoriesIng(){
     return App\Models\CategoryAnnonces::where('category_compte',CAT_ING)->get();
 }

 function DetailUser($user_id){
    return App\Models\DetailsUser::where('user_id',$user_id)->first();
 }

function Services(){
     return App\Models\Service::all();
}

function Categories(){
     return App\Models\CategoryAnnonces::all();
}
function AbonnementBoutique(){
	return App\Models\Abonnement::where('type_compte','Boutique')->get();
} 

function AbonnementProff(){
	return App\Models\Abonnement::where('type_compte','Proffessionnelle')->get();
} 

function Setting(){
     return App\Models\Setting::where('id',1)->first();
}

function LastBlog(){
     return App\Models\Blogs::where('status',1)->orderBy('id','DESC')->limit(3)->get();
}
function LastAnnonces(){
     return App\Models\Annonces::where('status',1)->orderBy('id','DESC')->limit(3)->get();
}


function unreadMessage(){
    return \App\Models\Contact::where('viewed' , 0)->get();
  }
function readMessage(){
    return \App\Models\Contact::where('viewed' , 1)->get();
  }

function unActiveUser(){
    return \App\Models\User::where('is_active' , 0)->get();
  }

  function unActiveAnnonce(){
    return \App\Models\Annonces::where('status' , 0)->get();
  }

?>