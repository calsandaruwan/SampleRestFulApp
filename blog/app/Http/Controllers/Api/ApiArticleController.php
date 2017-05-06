<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Interfaces\ArticleInterface;
use App\Article;

class ApiArticleController extends BaseController {

    private $article;

    public function __construct(ArticleInterface $articleInterface) {
        $this->article = $articleInterface;
    }

    public function getAll() {
        return $this->article->getAll();
    }
    
    public function get($id) {
        return $this->article->get($id);
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

                $response = $this->article->create();
                if ($response) {
                    return $response;
                }
            } else {
                return $validator->getMessageBag()->toArray();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function editArticle($id) {
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

                $response = $this->article->edit($id);
                if ($response) {
                    return $article;
                }
            } else {
                return $validator->getMessageBag()->toArray();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteArticle($id) {
        $this->article->delete($id);
    }

}
