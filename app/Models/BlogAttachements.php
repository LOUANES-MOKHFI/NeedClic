<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogAttachements extends Model
{
    protected $table = 'blog_attachements';
    protected $guarded = []; 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Blog(){
        return $this->belongsTo(Blogs::class, 'blog_id');
    }
}
