<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $appends = array('author');
    
    public function author(){
         return $this->belongsTo('App\Author','author_id');
    }
    
    public function getAuthorAttribute()
    {
        return $this->author()->first()->name;
    }
    
}
