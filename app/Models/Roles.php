<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'uuid','name','permissions'
    ];

    public function members(){
        $this->hasMany(Admin::class);
    }

    public function getPermissionsAttribute($permissions){
        return json_decode($permissions, true);
    }

    public function scopeIsRole($query,$uuid){
        return $query->where('uuid',$uuid);
    }
}
