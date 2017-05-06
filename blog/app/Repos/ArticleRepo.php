<?php

namespace App\Repos;

use App\Interfaces\ArticleInterface;
use App\Article;

class ArticleRepo implements ArticleInterface {

    private $article;

    public function __construct(Article $article) {
        $this->article = $article;
    }

    //get all articles
    public function getAll() {
        $data =  $this->article->orderBy('updated_at', 'desc')->get();
        if(count($data)){
            return $data;
        }
        return false;
    }

    //get single article
    public function get($id) {
        return $this->article->findOrFail($id);
    }

    //edit article
    public function edit($id) {
        $article = $this->article->findOrFail($id);
        
        $article->author_id = \Request::get('author_id');
        $article->content = \Request::get('content');
        $article->title = \Request::get('title');
        $article->url = \Request::get('url');
        
        if ($this->article->save()) {
            return $this->article;
        }
        return false;
        
    }

    //create new article
    public function create() {
        $this->article->author_id = \Request::get('author_id');
        $this->article->content = \Request::get('content');
        $this->article->title = \Request::get('title');
        $this->article->url = \Request::get('url');

        if ($this->article->save()) {
            return $this->article;
        }
        return false;
    }

    //delete article
    public function delete($id) {
        $article = $this->article->findOrfail($id);
        if($article->delete()){
            return $article;
        }
        return false;
    }

}
