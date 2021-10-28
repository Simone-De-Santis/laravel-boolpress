<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // impostiamo i campi Fillable per la funzione fill 
    protected $fillable = ['title', 'content', 'image', 'category_id', 'slug', 'user_id'];
    // funzione per la formattazione della data grazie a parametri esterni 
    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }
    // funzione per il collegamento della relazione con category
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
