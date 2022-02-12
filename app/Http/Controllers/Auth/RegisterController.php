<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DetailsUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Uuid;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
       // $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));

        //$user->notify(new RegistedUser());
        if($request->type_compte != 4){
        return $this->registered($request, $user)
                        ?: redirect('/login')->with('success',"Votre compte a bien été crée,veuillez attendre que l'administrateur accepte votre demande.");
        }
        else{
             return $this->registered($request, $user)
                        ?: redirect('/login')->with('success',"Votre compte a bien étè crée.");
        }
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['type_compte'] == 0) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'wilaya_id' => ['required', 'integer', 'exists:wilayas,id'],
                'commune_id' => ['required', 'integer', 'exists:communes,id'],
                'num_tlfn' => ['required', 'max:11','min:9'],
                'category_id' => ['required','integer', 'exists:categories_annonces,id'],
                'type_compte' => ['required', 'in:0'],
                'image' => ['required', 'mimes:png,jpeg,jpg'],
                'img_couverture' => ['required', 'mimes:png,jpeg,jpg'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }elseif($data['type_compte'] == 1) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'wilaya_id' => ['required', 'integer', 'exists:wilayas,id'],
                'commune_id' => ['required', 'integer', 'exists:communes,id'],
                'num_tlfn' => ['required', 'max:11','min:9'],
                'category_id' => ['required','integer', 'exists:categories_annonces,id'],
                'type_compte' => ['required', 'in:1'],
                'image' => ['required', 'mimes:png,jpeg,jpg'],
                'img_couverture' => ['required', 'mimes:png,jpeg,jpg'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        elseif($data['type_compte'] == 2) {
            if($data['type_compte_proff'] == 'Ingénieure') {
                return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'wilaya_id' => ['required', 'integer', 'exists:wilayas,id'],
                'commune_id' => ['required', 'integer', 'exists:communes,id'],
                'num_tlfn' => ['required', 'max:11','min:9'],
                'category_id' => ['required','integer', 'exists:categories_annonces,id'],
                'image' => ['required', 'mimes:png,jpeg,jpg'],
                'img_couverture' => ['required', 'mimes:png,jpeg,jpg'],
               // 'type_compte_proff' => ['required', 'in:Ingénieure,Artisant'],
                'diplome' => ['required'],
                //'niveaux' => ['required'],
                //'abonnement_id' => ['required', 'integer', 'exists:abonnements,id'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            }
            elseif($data['type_compte_proff'] == 'Artisant') {
                return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'wilaya_id' => ['required', 'integer', 'exists:wilayas,id'],
                'commune_id' => ['required', 'integer', 'exists:communes,id'],
                'num_tlfn' => ['required', 'max:11','min:9'],
                'category_id' => ['required','integer', 'exists:categories_annonces,id'],
                'image' => ['required', 'mimes:png,jpeg,jpg'],
                'img_couverture' => ['required', 'mimes:png,jpeg,jpg'],
              //  'type_compte_proff' => ['required', 'in:Ingénieure,Artisant'],
                //'abonnement_id' => ['required', 'integer', 'exists:abonnements,id'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            }
            
        }elseif($data['type_compte'] == 3){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'wilaya_id' => ['required', 'integer', 'exists:wilayas,id'],
                'commune_id' => ['required', 'integer', 'exists:communes,id'],
                'num_tlfn' => ['required', 'max:11','min:9'],
                'image' => ['required', 'mimes:png,jpeg,jpg'],
                'img_couverture' => ['required', 'mimes:png,jpeg,jpg'],
                'adress' => ['required'],
                'service_id' => ['required','integer', 'exists:services,id'],
                //'abonnement_id' => ['required', 'integer', 'exists:abonnements,id'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }elseif($data['type_compte'] == 4){
            return Validator::make($data, [
                'name'  => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'image' => ['required', 'mimes:png,jpeg,jpg'],
                'img_couverture' => ['required', 'mimes:png,jpeg,jpg'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {          
           
            if($data['type_compte']==4){
                $user = User::create([
                    'uuid' => Uuid::generate()->string,
                    'name' => $data['name'],
                    'email' =>  $data['email'],
                    'is_active' =>  1,
                    'type_compte' => $data['type_compte'],
                    'password' => Hash::make($data['password']),
                ]);
            }else{
                $user = User::create([
                    'uuid' => Uuid::generate()->string,
                    'wilaya_id'  => $data['wilaya_id'],
                    'commune_id' => $data['commune_id'],
                    'num_tlfn'   => $data['num_tlfn'],
                    'name' => $data['name'],
                    'email' =>  $data['email'],
                    'type_compte' => $data['type_compte'],
                    'category_id' => $data['type_compte']==3 ? null : $data['category_id'],
                    'password' => Hash::make($data['password']),
                ]);
            }

            

            if($data['image']){
                $image_profil = $data['image'];
                $file_name = $image_profil->getClientOriginalName();

                $user->image = $file_name;
                $user->save();

                $imageNameProfil = $image_profil->getClientOriginalName();
                $image_profil->move(public_path('User/'.$user->id),$imageNameProfil);

            }
            if($data['img_couverture']){
                $image_couverture = $data['img_couverture'];
                $file_name = $image_couverture->getClientOriginalName();

                $user->img_couverture = $file_name;
                $user->save();

                $imageNameCouv = $image_couverture->getClientOriginalName();
                $image_couverture->move(public_path('User/'.$user->id),$imageNameCouv);

            }
        if($data['type_compte'] == 2) {
            DetailsUser::create([
                'type_compte_proff' => $data['type_compte_proff'],
                'diplome' => $data['type_compte']==2 ? null : $data['diplome'],
                //'niveaux' => $data['type_compte']==2 ? null : $data['niveaux'],
                'abonnement_id' => 0,//$data['abonnement_id'],
                'user_id' => $user->id,
            ]);
        }elseif($data['type_compte'] == 3){
            DetailsUser::create([
                'service_id' => $data['service_id'],
                'adress' => $data['adress'],
                'abonnement_id' => 0,//$data['abonnement_id'],
                'user_id' => $user->id,
            ]);
        }
        return $user;
        
    }
}
