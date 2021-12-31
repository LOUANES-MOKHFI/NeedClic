<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Admin extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'admins';
    protected $guarded = [];

    public $timestamps = true;

    public function scopeIsAdmin($query,$uuid){
        return $query->where('uuid',$uuid);
    }

    public function role(){
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function cabinet(){
    	return $this->belongsTo(Cabinets::class,'cabinet_id');
    }

    public function hasAbility($permissions){
        $role = $this->role;
        if(!$role){
            return false;
        }

        foreach ($role->permissions as $permission) {
                if(is_array($permission) && in_array($permission, $permissions)){
                    return true;
                }
                else if(is_string($permissions) && strcmp($permissions,$permission) == 0){
                    return true;
                }
        }
        return false;
    }

}
