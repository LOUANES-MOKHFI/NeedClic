<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wilaya;
use App\Models\DetailsUser;
use App\Http\Requests\Admin\ProfilRequest;
use App\Http\Requests\Admin\ProfilPasswordRequest;
use Auth;
class ProfilController extends Controller
{
     public function index(){
    	$data=[];
    	$auth_user = Auth::user()->id;
        $data['user'] = User::where('id',$auth_user)->first();
        $data['detail'] = DetailsUser::where('user_id',$auth_user)->first();
         if(!$data['user']){
	    	$data['status'] = 500;
	    	$data['msg'] = "Ce profil n'existe pas"
	    	return response()->json($data);
            //return redirect()->back()->with(['error'=>""]);
        }
    	$data['status'] = 200;
    	$data['msg'] = ""
    	return response()->json($data);
       // return view('users.dashboard.profil.index',$data);
    }

    public function updateInfo(Request $request)
    {
    	$auth_user = Auth::user()->id;
        $data['member'] = User::where('id',$auth_user)->first();
        $data['detail'] = DetailsUser::where('user_id',$auth_user)->first();
         if(!$data['member']){
	    	$data['status'] = 500;
	    	$data['msg'] = "Ce profil n'existe pas"
	    	return response()->json($data);
        }
        try {
            
            $data['member']->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'num_tlfn'    => $request->num_tlfn,
                'wilaya_id'   => $request->wilaya_id,
                'commune_id'    => $request->commune_id,
            ]);
            if($request->hasFile('attachement')){
                $image = $request->file('attachement');
                $file_name = $image->getClientOriginalName();

                $data['member']->image = $file_name;
                $data['member']->save();

                $imageName = $image->getClientOriginalName();
                $image->move(public_path('User/'.$data['member']->name),$imageName);

            }
            if($request->type_compte == 2){
            	 $data['detail']->update([
            	 	'diplome'    => $request->diplome,
                	'niveaux'   => $request->niveaux,
            	 ]);
            }elseif($request->type_compte == 3){
            	$data['detail']->update([
            		'adress'    => $request->adress,
                	'service_id'   => $request->service_id,
            	 ]);
            }

	    	$data['status'] = 200;
	    	$data['msg'] = "Votre profil a étè modifiée avec success"
	    	return response()->json($data);
        } catch (Exception $e) {
	    	$data['status'] = 500;
	    	$data['msg'] = "erreur, s'il vous plait verifier vos informations"
	    	return response()->json($data);
        }
    }
   

    public function updatePassword(ProfilPasswordRequest $request)
    {
        $data=[];

    	$auth_user = Auth::user()->id;
        $data['member'] = User::where('id',$auth_user)->first();
         if(!$data['member']){
	    	$data['status'] = 500;
	    	$data['msg'] = "Ce profil n'existe pas"
	    	return response()->json($data);
        }
        try {
            $data['member']->update([
                'password'=> bcrypt($request->password),
            ]);

	    	$data['status'] = 200;
	    	$data['msg'] = "Votre Mot de passe a étè modifiée avec success"
	    	return response()->json($data);
        } catch (Exception $e) {
	    	$data['status'] = 500;
	    	$data['msg'] = "erreur, s'il vous plait verifier vos informations"
	    	return response()->json($data);
        }
    }
}
