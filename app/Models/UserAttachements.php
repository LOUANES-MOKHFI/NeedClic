<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAttachements extends Model
{
    protected $table = 'user_attachements';
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function album(){
        return $this->belongsTo(Album::class, 'album_id');
    }

}
