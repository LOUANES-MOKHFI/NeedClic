<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBlogs extends Model
{
    protected $table = 'categories_blogs';
    protected $guarded = [];

   	public function blogs(){
        return $this->hasMany(Blogs::class,'category_id')->select('id','uuid','titre','image')->orderBy('id','DESC')->limit(2);
    }

}
