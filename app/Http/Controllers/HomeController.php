<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.home.index');
    }

    public function getCommune($wilaya_id){
        $communes = Commune::where('wilaya_id',$wilaya_id)->get();
        return response()->json($communes);
    }
}
