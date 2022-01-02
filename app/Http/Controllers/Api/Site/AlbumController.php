<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\UserAttachements;
use App\Http\Requests\Admin\AlbumRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Publicite;

use Uuid;
use DB;
use Auth;
class AlbumController extends Controller
{
    public function create(){

        $data = [];
        $data['status'] = 200;
        $data['msg'] = ;
        return response()->json($data);
    }

    public function store(AlbumRequest $request){
        try {
            if($request->has('status')){
                $request->status = 1;
            }else{
                $request->status = 0;
            }
                $album = Album::create([
                    'uuid'          => Uuid::generate()->string,
                    'status'        => $request->status ,
                    'title'         => $request->title,
                    'user_id'       => Auth::user()->id,
                ]);
                

                if($request->hasFile('attachments')){
                
                    foreach ($request->attachments as $attachement) {
                        //return $attachement;
                        $image = $attachement;
                        $file_name = $image->getClientOriginalName();

                        $attachements = new UserAttachements();
                        $attachements->file_name = $file_name;
                        $attachements->user_id = $album->user_id;
                        $attachements->album_id  = $album->id;
                        $attachements->save();

                        ///Move Attachements
                        $imageName = $attachement->getClientOriginalName();
                        $attachement->move(public_path('Albums/'.$album->id),$imageName);
                    }
                }
                $data = [];
                $data['status'] = 200;
                $data['msg'] = "Votre album a étè crée avec success";
                return response()->json($data);
        } catch (Exception $e) {
            $data = [];
            $data['status'] = 500;
            $data['msg'] = "veuillez Verifiez vos informations !!";
            return response()->json($data);
        }
    }

    public function show($uuid)
    {
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$data['album']){
            $data = [];
            $data['status'] = 500;
            $data['msg'] = "cette album n\'existe pas";
            return response()->json($data);
        }
        $data = [];
        $data['status'] = 200;
        $data['msg'] = "";
        return response()->json($data);
    }
    public function edit($uuid){
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$data['album']){
            $data = [];
            $data['status'] = 500;
            $data['msg'] = "erreur, s'il vous plait verifier vos informations";
            return response()->json($data);
        }
        $data = [];
        $data['status'] = 200;
        $data['msg'] = "";
        return response()->json($data);
        return view('users.dashboard.albums.edit',$data);
    }

    public function update(AlbumRequest $request,$uuid){ 
        $data = [];

        $album = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$album){
            $data['status'] = 500;
            $data['msg'] = "erreur, L'album n'existe pas";
            return response()->json($data);
        }
        try {
            if($request->has('status')){
                $request->status = 1;
            }else{
                $request->status = 0;
            }
                $album->update([
                    'status'        => $request->status,
                    'title'         => $request->title,
                ]);
            $data['status'] = 200;
            $data['msg'] = "Votre album a étè modifiée avec success";
            return response()->json($data);
        } catch (Exception $e) {
            $data['status'] = 500;
            $data['msg'] = "veuillez Verifiez vos informations !!";
            return response()->json($data);
        }
    }

    public function destroy($uuid)
    {
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$data['album']){
        $data['status'] = 500;
        $data['msg'] = "cette album n'existe pas";
        return response()->json($data);
        }
        $attachements = UserAttachements::where('album_id',$data['album']->id)->delete();
        $data['album']->delete();

        $data['status'] = 200;
        $data['msg'] = "L'album a étè supprimée avec success";
        return response()->json($data);
    }

    public function deleteImage($id){
        $data = [];
        $userId = Auth::user()->id;
        $data['attachement'] = UserAttachements::where('id',$id)->where('user_id',$userId)->first();
        if(!$data['attachement']){
            $data['status'] = 500;
            $data['msg'] = "cette album n'existe pas";
            return response()->json($data);
        }
        $album = Album::where('id',$data['attachement']->album_id)->where('user_id',$userId)->first();
        if(!$album){
            $data['status'] = 500;
            $data['msg'] = "cette album n'existe pas";
            return response()->json($data);
        }
        $data['attachement']->delete();
        Storage::disk('albums')->delete($album->id.'/'.$data['attachement']->file_name);

        $data['status'] = 200;
        $data['msg'] = "L'image a étè supprimée avec success";
        return response()->json($data);
    }


    public function storeAttachements(AlbumRequest $request){
        $data = [];
        $userId = $request->user_id;
        $albumId = $request->album_id;
        $album = Album::where('id',$albumId)->where('user_id',$userId)->first();

        if(!$album){
            $data['status'] = 500;
            $data['msg'] = "cette album n'existe pas";
            return response()->json($data);
        }
        if($request->attachments){  
            foreach ($request->attachments as $attachement) {
                    //return $attachement;
                    $image = $attachement;
                    $file_name = $image->getClientOriginalName();

                    $attachements = new UserAttachements();
                    $attachements->file_name = $file_name;
                    $attachements->user_id = $userId;
                    $attachements->album_id  = $albumId;
                    $attachements->save();

                    ///Move Attachements
                    $imageName = $attachement->getClientOriginalName();
                    $attachement->move(public_path('Albums/'.$album->id),$imageName);
                }
                $data['status'] = 200;
                $data['msg'] = "L'image a étè ajouter avec success";
                return response()->json($data);

        }


    }

    
    public function showAlbum($uuid)
    {   
        $data = [];
        $data['album'] = Album::where('uuid',$uuid)->first();
        if(!$data['album']){
            $data['status'] = 500;
            $data['msg'] = "cette album n'existe pas";
            return response()->json($data);
        }
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        
        $data['status'] = 200;
        $data['msg'] = "";
        return response()->json($data);
    }
}
