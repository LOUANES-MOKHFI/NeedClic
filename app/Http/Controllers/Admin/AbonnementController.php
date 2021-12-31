<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Abonnement;
use App\Http\Requests\Admin\AbonnementRequest;
use Uuid;
class AbonnementController extends Controller
{
    public function index()
    {
        $data=[];
        $data['abonnements'] = Abonnement::all();
        return view('admin.settings.abonnements.index',$data);
    }

   
    public function create()
    {
        return view('admin.settings.abonnements.add');
    }

   
    public function store(AbonnementRequest $request)
    {	
    	
    	try {
    		$abonnement = Abonnement::create([
            'type_compte' => $request->type_compte,
            'duree' => $request->duree,
        	'montant' => $request->montant,
        	]);
        	return redirect()->route('admin.settings.abonnements')->with(['success' => "L'abonnement est ajoutée avec success"]);
    	} catch (Exception $e) {
    		return redirect()->route('admin.settings.abonnements')->with(['error' => 'Verifiez vos informations !!']);
    	}

    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $data = [];
        $data['abonnement'] = Abonnement::where('id',$id)->first();
        if(!$data['abonnement']){
            return redirect()->route('admin.settings.abonnements')->with(['error'=>'cette abonnement n\'existe pas']);
        }
        return view('admin.settings.abonnements.edit',$data);
    }

    
    public function update(AbonnementRequest $request, $id)
    {
        $data = [];
        $data['abonnement'] = Abonnement::where('id',$id)->first();
        if(!$data['abonnement']){
            return redirect()->route('admin.settings.abonnements')->with(['error'=>'cette abonnement n\'existe pas']);
        }
        $data['abonnement']->update([
            'type_compte' => $request->type_compte,
            'duree' => $request->duree,
            'montant' => $request->montant,
        ]);

        return redirect()->route('admin.settings.abonnements')->with(['success' => "L'abonnement est modifiée avec success"]);

    }

   
    public function destroy($id)
    {
        $data = [];
        $data['abonnement'] = Abonnement::where('id',$id)->first();
        if(!$data['abonnement']){
            return redirect()->route('admin.settings.abonnements')->with(['error'=>'cette abonnement n\'existe pas']);
        }
        $data['abonnement']->delete();

        return redirect()->route('admin.settings.abonnements')->with(['success' => "L'abonnement est supprimée avec success"]);

    }
}
