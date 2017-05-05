<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Article;

class Author extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //one author has multiple articles.
    public function article() {
        return $this->belongsTo(Article);
    }

}
