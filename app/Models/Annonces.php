<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonces extends Model
{
    use SoftDeletes;
    protected $table = 'annonces';
    protected $guarded = [];

    public function scopeIsAnnonce($query,$uuid){
        return $query->where('uuid',$uuid);
    }
    public function scopeIsActive($query){
        return $query->where('status',1);
    }
    public function scopeMyAnnonce($query,$id){
        return $query->where('user_id',$id);
    }
    

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function detail(){
        return $this->belongsTo(DetailsUser::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(CategoryAnnonces::class, 'category_id');
    }

    public function attachements(){
        return $this->hasMany(AttachementsAnnonce::class,'annonce_id');
    }

    public function likes(){
        return $this->hasMany(UserLikes::class,'annonce_id');
    }


}
