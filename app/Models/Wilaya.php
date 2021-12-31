<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    public $table = 'wilayas';
    protected $guarded = [];

    public function wilaya(){
    	return $this->hasMany(Commune::class);
    }
}
