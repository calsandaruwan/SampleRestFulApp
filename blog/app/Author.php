<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //one author has multiple articles.
    public function articles() {
        return $this->hasMany('App\Article');
    }

}
