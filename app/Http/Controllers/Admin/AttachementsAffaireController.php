<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttachementsAffaire;
use App\Models\Admin;
use App\Models\Cabinets;
use Illuminate\Support\Facades\Storage;

class AttachementsAffaireController extends Controller
{
    public function store(Request $request){
		//return $request;
		$user_auth = auth('admins')->user()->id;
		$data['avocat'] = Admin::where('id',$user_auth)->first();
        $cabinet = Cabinets::where('id',$data['avocat']->cabinet_id)->first();
        if(!$cabinet){
        	return redirect()->back()->with(['error'=>'erreur de systeme, la cabinet n\'exsite pas']);
        }
		$this->validate($request, [

        'file_name' => 'required|mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'Le format de fichier doit étre  pdf, jpeg , png , jpg',
        ]);
        
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

        $attachements = new AttachementsAffaire();
	    $attachements->file_name = $file_name;
	    $attachements->num_affaire= $request->num_affaire;
	    $attachements->user_id = $user_auth;
	    $attachements->affaire_id  = $request->affaire_id;
        $attachements->save();
           
        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachements/'.$cabinet->name.'/'. $request->num_affaire), $imageName);
        
        return redirect()->back()->with(['success'=> 'Le fichier a étè ajoutée avec success']);
        
	}

	public function destroy(Request $request){
		$user_auth = auth('admins')->user()->id;
		$data['avocat'] = Admin::where('id',$user_auth)->first();
        $cabinet = Cabinets::where('id',$data['avocat']->cabinet_id)->first();
        if(!$cabinet){
        	return redirect()->back()->with(['error'=>'erreur de systeme, la cabinet n\'exsite pas']);
        }
        
    	$affaire = AttachementsAffaire::findOrfail($request->file_id);
    	$affaire->delete();
    	Storage::disk('public_uploads')->delete($cabinet->name.'/'.$request->num_affaire.'/'.$request->file_name);
    	return redirect()->back()->with(['success'=>'Le fichier a étè supprimée avec success']);
    }

    public function open($num_affaire,$file_name){
    	$user_auth = auth('admins')->user()->id;
		$data['avocat'] = Admin::where('id',$user_auth)->first();
        $cabinet = Cabinets::where('id',$data['avocat']->cabinet_id)->first();
        if(!$cabinet){
        	return redirect()->back()->with(['error'=>'erreur de systeme, la cabinet n\'exsite pas']);
        }

    	$file = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($cabinet->name.'/'.$num_affaire.'/'.$file_name);
    	return response()->file($file);
    }

    /*public function download($num_affaire,$file_name){
    	$content = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
    	return response()->download($content);

    }*/
}
