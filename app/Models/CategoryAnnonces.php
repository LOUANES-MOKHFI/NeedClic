<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAnnonces extends Model
{
    protected $table = 'categories_annonces';
    protected $guarded = [];

    

    public function annonces(){
        return $this->hasMany(Annonces::class);
    }
}
