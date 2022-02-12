<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid','name', 'email', 'password','wilaya_id','commune_id','num_tlfn','type_compte','image','img_couverture','category_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wilaya(){
        return $this->belongsTo(Wilaya::class,'wilaya_id');
    }

    public function commune(){
        return $this->belongsTo(Commune::class,'commune_id');
    }
    public function detail(){
        return $this->belongsTo(DetailsUser::class);
    }
    public function category(){
        return $this->belongsTo(CategoryAnnonces::class,'category_id');
    }
    public function annonces(){
        return $this->hasMany(Annonces::class)->where('status',1);
    }
    public function albums(){
        return $this->hasMany(Album::class)->where('status',1)->where('is_active',1);
    }
    public function user_attachements(){
        return $this->hasMany(UserAttachements::class);
    }
    public function reviews(){
        return $this->hasMany(UserReviews::class,'compte_id');
    }

    
}
