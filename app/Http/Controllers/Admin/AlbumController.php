<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\UserAttachements;
use Illuminate\Support\Facades\Mail;

class AlbumController extends Controller
{
    public function index(){
        $data['albums'] = Album::all();
        return view('admin.albums.index',$data);
    }
    public function show($uuid)
    {
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->first();
        if(!$data['album']){
            return redirect()->route('admin.albums')->with(['error'=>'cette album n\'existe pas']);
        }

        return view('admin.albums.show',$data);
    }
    public function destroy($uuid)
    {
        $data = [];
        $data['album'] = Album::where('uuid',$uuid)->first();
        if(!$data['album']){
            return redirect()->route('admin.albums')->with(['error'=>'cette album n\'existe pas']);
        }
        $data['album']->delete();

        return redirect()->route('admin.albums')->with(['success' => "L'album a étè supprimée avec success"]);

    }
    public function Approuver($uuid){
        $data['album'] = Album::where('uuid',$uuid)->first();
        if(!$data['album']){
            return redirect()->route('admin.albums')->with(['error'=>'cette album n\'existe pas']);
        }
        $status = $data['album']->is_active == 0 ? 1 : 0 ;
         // return $status;
        $data['album']->is_active = $status;
        $name = $data['album']->user->name;
        $email = $data['album']->user->email;
        $this->sendMail($name,$email);
        $data['album']->save();
        
        return redirect()->back()->with(['success' => "Le status de l'album a étè changer avec success"]);

    }

    public function sendMail($to_name,$to_email){

        $data = array('name'=>$to_name, "header" => "
             Votre album dans la plateform NeedClic est accepté,",
            "lien" => "www.needclic.com/fr",
            );
            Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('NeedClic');
            $message->from('contact@needclic.com','NeedClic');
            });
    }
}
