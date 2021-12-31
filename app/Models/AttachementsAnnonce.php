<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachementsAnnonce extends Model
{
   
    protected $table = 'attachements_annonce';
    protected $guarded = []; 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
