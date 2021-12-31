<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blogs extends Model
{
    use SoftDeletes;
    protected $table = 'blogs';
    protected $guarded = [];


    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function category(){
        return $this->belongsTo(CategoryBlogs::class,'category_id');
    }

    public function scopeActive($query){
        return $query->where('status',1);
    }
    public function scopeIsBlog($query,$uuid){
        return $query->where('uuid',$uuid);
    }

    public function attachements(){
        return $this->hasMany(BlogAttachements::class,'blog_id');
    }
    
}

