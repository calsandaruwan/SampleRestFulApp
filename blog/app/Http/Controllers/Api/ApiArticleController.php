<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Article;

class ApiArticleController extends BaseController {

    private $article;

    public function __construct(Article $article) {
        $this->article = $article;
    }

    public function getArticle($id = 0) {
        return $this->article->all();
    }

    public function createArticle() {
        try {
            $rules = array(
                'author_id' => 'required|int',
                'content' => 'required',
                'title' => 'required',
                'url' => 'required',
            );

            $messages = array(
                'author_id.int' => 'Invalid Author',
            );

            $validator = Validator::make(\Request::all(), $rules, $messages);

            if ($validator->passes()) {
                $this->article->author_id = \Request::get('author_id');
                $this->article->content = \Request::get('content');
                $this->article->title = \Request::get('title');
                $this->article->url = \Request::get('url');
                if ($this->article->save()) {
                    return $this->article;
                }
            } else {
                return $validator->getMessageBag()->toArray();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function editArticle($id) {
        $article = Article::find($id);
        $rules = array(
            'author_id' => 'required|int',
            'content' => 'required',
            'title' => 'required',
            'url' => 'required',
        );

        $messages = array(
            'author_id.int' => 'Invalid Author',
        );
        
        $validator = Validator::make(\Request::all(), $rules, $messages);
        
        if ($validator->passes()) {
            $article->author_id = \Request::get('author_id');
            $article->content = \Request::get('content');
            $article->title = \Request::get('title');
            $article->url = \Request::get('url');
            if ($article->save()) {
                return $article;
            }
        }else{
            return $validator->getMessageBag()->toArray();
        }
    }

    public function deleteArticle($id) {
        $article = Article::find($id);
        $article->delete();
    }

}
