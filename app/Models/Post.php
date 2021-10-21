<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // impostiamo i campi Fillable per la funzione fill 
    protected $fillable = ['title', 'content', 'image', 'slug'];
    // funzione per la formattazione della data grazie a parametri esterni 
    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }
}
