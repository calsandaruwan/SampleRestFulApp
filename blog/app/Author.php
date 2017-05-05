<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Author extends Model
{
    //one author has multiple articles.
    public function article()
    {
        return $this->belongsTo('Article');
    }
}
