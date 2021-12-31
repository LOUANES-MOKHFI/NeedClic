<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    protected $table = 'abonnements';
    protected $guarded = [];

    public function users(){
    	return $this->hasMany(User::class);
    }

    

}
