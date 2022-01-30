<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wilaya;
use App\Models\DetailsUser;
use App\Models\UserAttachements;
use App\Http\Requests\Admin\ProfilRequest;
use App\Http\Requests\Admin\ProfilPasswordRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
class ProfilController extends Controller
{
    public function index(){
    	$data=[];
    	$auth_user = Auth::user()->id;
        $data['user'] = User::where('id',$auth_user)->first();
        $data['detail'] = DetailsUser::where('user_id',$auth_user)->first();
         if(!$data['user']){
            return redirect()->back()->with(['error'=>"Ce profil n'existe pas"]);
        }
        return view('users.dashboard.profil.index',$data);
    }
    public function editDescription(){
        $data=[];
        $auth_user = Auth::user()->id;
        $data['user'] = User::where('id',$auth_user)->first();
        $data['detail'] = DetailsUser::where('user_id',$auth_user)->first();
         if(!$data['user']){
            return redirect()->back()->with(['error'=>"Ce profil n'existe pas"]);
        }
        return view('users.dashboard.profil.edit_description',$data);
    }
    public function storeDescription(Request $request,$uuid){
        $data=[];
        $data['user'] = User::where('uuid',$uuid)->first();
        if(!$data['user']){
            return redirect()->back()->with(['error'=>"Ce profil n'existe pas"]);
        }
        $data['detail'] = DetailsUser::where('user_id',$data['user']->id)->first();
        if(!$data['detail']){
            return redirect()->back()->with(['error'=>"Ce profil n'existe pas"]);
        }
        $data['detail']->update([
            'description' => $request->description,
        ]);
        return redirect()->route('users.dashboard')->with(['success'=>"la description a étè ajoutée avec success"]);
    }

    public function updateInfo(Request $request)
    {
       
        $auth_user = Auth::user()->id;
        $data['member'] = User::where('id',$auth_user)->first();
        $data['detail'] = DetailsUser::where('user_id',$auth_user)->first();
         if(!$data['member']){
            return redirect()->route('admin.profil.edit')->with(['error'=>"Ce profil n'existe pas"]);
        }
        try {
            $data['detail']->update([
                    'description'    => $request->description,
                 ]);  
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
                $image->move(public_path('User/'.$data['member']->id),$imageName);

            }
           if($request->hasFile('img_couverture')){
                $image_couverture = $request->file('img_couverture');
                $file_name = $image_couverture->getClientOriginalName();

                $data['member']->img_couverture = $file_name;
                $data['member']->save();

                $imageNameCouv = $image_couverture->getClientOriginalName();
                $image_couverture->move(public_path('User/'.$data['member']->id),$imageNameCouv);

            }
           
            //return $request->user_attachements;
            
        
            if($data['member']->type_compte == 2){
            	 $data['detail']->update([
            	 	'diplome'    => $request->diplome,
                	'niveaux'   => $request->niveaux,
            	 ]);
            }elseif($data['member']->type_compte == 3){
            	$data['detail']->update([
            		'adress'    => $request->adress,
                	'service_id'   => $request->service_id,
            	 ]);
            }

            return redirect()->back()->with(['success'=>"Votre profil a étè modifiée avec success"]);

        } catch (Exception $e) {
            return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
        }
    }
   
    public function updatePortfolio(Request $request,$uuid){
        $user = User::where('uuid',$uuid)->first();
       if(!$user){
        return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
       }
        $detail = DetailsUser::where('user_id',$user->id)->first();
        $detail->update([
                    'description'    => $request->description,
                 ]);
        if($request->hasFile('images')){
                
                foreach($request->images as $userAttachement) {
                 
                    $userimage = $userAttachement;
                    $file_name_user = $userimage->getClientOriginalName();

                    $attachementsUser = new UserAttachements();
                    $attachementsUser->file_name = $file_name_user;
                    $attachementsUser->user_id = $user->id;
                    $attachementsUser->save();

                    ///Move Attachements
                    $imageUserName = $userAttachement->getClientOriginalName();
                    $userAttachement->move(public_path('Profil/'.$user->id),$imageUserName);
                }
            }

             return redirect()->back()->with(['success'=>"Votre portfolio a étè modifiée avec success"]);

    }
    public function updatePassword(ProfilPasswordRequest $request)
    {
    	$auth_user = Auth::user()->id;
        $data['member'] = User::where('id',$auth_user)->first();
         if(!$data['member']){
            return redirect()->back()->with(['error'=>"Ce profil n'existe pas"]);
        }
        try {
            $data['member']->update([
                'password'=> bcrypt($request->password),
            ]);

            return redirect()->back()->with(['success'=>"Votre Mot de passe a étè modifiée avec success"]);

        } catch (Exception $e) {
            return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
        }
    }

    public function deleteImage($id){
        $userId = Auth::user()->id;
        $data['attachement'] = UserAttachements::where('id',$id)->where('user_id',$userId)->first();
        if(!$data['attachement']){
            return redirect()->back()->with(['error'=>'cette image n\'existe pas']);
        }
        $user = User::where('id',$data['attachement']->user_id)->first();
        if(!$user){
            return redirect()->back()->with(['error'=>'cette utilisateur n\'existe pas']);
        }
        $data['attachement']->delete();
        Storage::disk('profile')->delete($user->id.'/'.$data['attachement']->file_name);

        return redirect()->back()->with(['success' => "L'image a étè supprimée avec success"]);
    }
}
