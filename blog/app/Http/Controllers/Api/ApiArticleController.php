<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use App\Article;


class ApiArticleController extends BaseController
{

    public function getArticle($id=0){
        dd(Article::all());
    }
    
    public function createArticle(){
        
    }
    
    public function editArticle($id=0){
        
    }
    
    public function deleteArticle($id=0){
        
    }
}
