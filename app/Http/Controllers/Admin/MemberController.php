<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\DetailsUser;
use App\Http\Requests\Admin\MemberRequest;
use Uuid;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    
    public function index()
    {
        $data=[];
        
       
        $data['users'] = User::orderBy('id','DESC')->get();
        return view('admin.users.index',$data);
    }

    public function create()
    {
        $data=[];
        $user_auth = auth('admins')->user()->id;
        $data['user'] = Admin::where('id',$user_auth)->first();
        $data['cabinets'] = Cabinets::active()->get();
        $data['roles'] = Roles::all();
        return view('admin.users.add',$data);
    }


    public function show($uuid)
    {
        $data = [];
        $data['user'] = User::where('uuid',$uuid)->first();

        if(!$data['user']){
            return redirect()->route('admin.users')->with(['error'=>"Ce member n'existe pas"]);
        }
        $data['detail'] = DetailsUser::where('user_id',$data['user']->id)->first();
        return view('admin.users.show',$data);
    }


    public function destroy($uuid)
    {
        $data=[];
        //$data['roles'] => Role::active()->get();
       $data['member'] = User::where('uuid',$uuid)->first();
         if(!$data['member']){
            return redirect()->route('admin.users')->with(['error'=>"Ce member n'existe pas"]);
        }
        if($data['member']->delete()){
            return redirect()->route('admin.users')->with(['success'=>"Le member a étè supprimée avec success"]);   
        }
    }

    public function changeStatus($uuid){
        $data['membre'] = User::where('uuid',$uuid)->first();
        if(!$data['membre']){
            return redirect()->route('admin.membres')->with(['error'=>'cette membre n\'existe pas']);
        }
        $status = $data['membre']->is_active == 0 ? 1 : 0 ;
         // return $status;
        $data['membre']->is_active = $status;
       

        $data['membre']->save();
        $to_name = $data['membre']->name;
        $to_email = $data['membre']->email;
        $data = array('name'=>$to_name, "header" => "
             Votre inscription dans la plateform NeedClic est confirmer,vous peuvez accéder à la plateforme et publier vos annonces",
            "lien" => "www.needclic.com/fr/login",
            );
            Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('NeedClic');
            $message->from('contact@needclic.com','NeedClic');
            });
        return redirect()->back()->with(['success' => "Le status de membre a étè changer avec success"]);

    }

    public function AddToHome($uuid){
        $data['membre'] = User::where('uuid',$uuid)->first();
        if(!$data['membre']){
            return redirect()->route('admin.membres')->with(['error'=>'cette membre n\'existe pas']);
        }
        $status = $data['membre']->in_home == 0 ? 1 : 0 ;
         // return $status;
        $data['membre']->in_home = $status;
        $data['membre']->save();
        return redirect()->back()->with(['success' => "Ce profile a étè ajouter a la page d'accueil avec success"]);

    }
}
