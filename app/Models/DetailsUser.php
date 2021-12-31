<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsUser extends Model
{
    protected $table = 'details_user';
    protected $guarded = [];    

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function abonnement(){
        return $this->belongsTo(Abonnement::class, 'abonnement_id');
    }

}
