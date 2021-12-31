<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publicite;
class AboutController extends Controller
{
    public function index()
    {   
        $data=[];
        $data['pubs'] = Publicite::where('in_home',1)->where('image',
            '<>',null)->get();
        return view('users.about.index',$data);
    }
}
