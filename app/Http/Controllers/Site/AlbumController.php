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

        return view('users.dashboard.albums.add');
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
            return redirect()->route('users.dashboard')->with(['success' => 'Votre album a étè crée avec success']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'veuillez Verifiez vos informations !!']);
        }
    }

    public function show($uuid)
    {
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$data['album']){
            return redirect()->route('users.dashboard')->with(['error'=>'cette album n\'existe pas']);
        }
        return view('users.dashboard.albums.show',$data);
    }
    public function edit($uuid){
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$data['album']){
        return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
        }
        return view('users.dashboard.albums.edit',$data);
    }

    public function update(AlbumRequest $request,$uuid){
        $album = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$album){
            return redirect()->back()->with(['error'=>"erreur, s'il vous plait verifier vos informations"]);
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
            
            return redirect()->route('users.dashboard')->with(['success' => 'Votre album a étè modifiée avec success']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'veuillez Verifiez vos informations !!']);
        }
    }

    public function destroy($uuid)
    {
        $data = [];
        $data['album'] = Album::isAlbum($uuid)->myAlbum(Auth::user()->id)->first();
        if(!$data['album']){
            return redirect()->route('users.dashboard')->with(['error'=>'cette album n\'existe pas']);
        }
        $attachements = UserAttachements::where('album_id',$data['album']->id)->delete();
        $data['album']->delete();

        return redirect()->route('users.dashboard')->with(['success' => "L'album a étè supprimée avec success"]);
    }

    public function deleteImage($id){
        $userId = Auth::user()->id;
        $data['attachement'] = UserAttachements::where('id',$id)->where('user_id',$userId)->first();
        if(!$data['attachement']){
            return redirect()->back()->with(['error'=>'cette image n\'existe pas']);
        }
        $album = Album::where('id',$data['attachement']->album_id)->where('user_id',$userId)->first();
        if(!$album){
            return redirect()->back()->with(['error'=>'cette album n\'existe pas']);
        }
        $data['attachement']->delete();
        Storage::disk('albums')->delete($album->id.'/'.$data['attachement']->file_name);

        return redirect()->back()->with(['success' => "L'image a étè supprimée avec success"]);
    }


    public function storeAttachements(AlbumRequest $request){
        $userId = $request->user_id;
        $albumId = $request->album_id;
        $album = Album::where('id',$albumId)->where('user_id',$userId)->first();

        if(!$album){
            return redirect()->back()->with(['error'=>'cette album n\'existe pas']);
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
        return redirect()->back()->with(['success' => "L'image a étè ajouter avec success"]);

        }


    }

    
    public function showAlbum($uuid)
    {   
        $data = [];
        $data['album'] = Album::where('uuid',$uuid)->first();
        if(!$data['album']){
            return redirect()->back()->with(['error'=>'cette album n\'existe pas']);
        }
        $data['pubs'] = Publicite::where('in_home',3)->where('image',
            '<>',null)->get();
        
        return view('users.albums.show',$data);
    }
}
