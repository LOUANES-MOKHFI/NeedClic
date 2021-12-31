<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $guarded = [];

    public function scopeIsAlbum($query,$uuid){
        return $query->where('uuid',$uuid);
    }
   
    public function scopeMyAlbum($query,$id){
        return $query->where('user_id',$id);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function attachements(){
        return $this->hasMany(UserAttachements::class,'album_id');
    }
}
