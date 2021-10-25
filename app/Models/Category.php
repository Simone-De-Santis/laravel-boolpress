<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // funzione per il collegamento della relazione con post
    //
    public function Posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
