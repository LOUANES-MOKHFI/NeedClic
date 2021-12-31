<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public $table = 'communes';
    protected $guarded = [];

    public function wilaya(){
    	return $this->belongsTo(Wilaya::class,'wilaya_id');
    }
}
