<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Interfaces\ArticleInterface;
Use Exception;

class ApiArticleController extends BaseController {

    private $article;

    public function __construct(ArticleInterface $articleInterface) {
        $this->article = $articleInterface;
    }

    public function getAll() {
        $response = $this->article->getAll();
        if ($response) {
            return format_response([
                'error' => 'false',
                'data' => $response
            ]);
        }
        return format_response([
            'message' => 'No record found'
        ]);
    }

    public function get($id) {
        try {
            return format_response([
                'error' => 'false',
                'data' => $this->article->get($id)
            ]);
        } catch (Exception $e) {
            return format_response([
                'message' => $e->getMessage()
            ]);
        }
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
                    return format_response([
                        'error' => 'false',
                        'data' => $response
                    ]);
                }
                return format_response([
                    'message' => "Something Went Wrong",
                    'data' => \Request::all()
                ]);
            } else {
                return format_response([
                    'message' => $validator->getMessageBag()->toArray(),
                    'data' => \Request::all()
                ]);
            }
        } catch (Exception $e) {
            return format_response([
                'message' => $e->getMessage(),
                'data' => \Request::all()
            ]);
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
                    return format_response([
                        'error' => 'false',
                        'data' => $response
                    ]);
                }
                return format_response([
                    'message' => "Something went wrong",
                    'data' => \Request::all()
                ]);
            } else {
                return format_response([
                    'message' => $validator->getMessageBag()->toArray(),
                    'data' => \Request::all()
                ]);
            }
        } catch (Exception $e) {
            return format_response([
                'message' => $e->getMessage(),
                'data' => \Request::all()
            ]);
        }
    }

    public function deleteArticle($id) {
        try {
            $response = $this->article->delete($id);
            if ($response) {
                return format_response([
                    'error' => 'false',
                    'data' => $response
                ]);
            }
            return format_response([
                'message' => "Something went wrong",
                'data' => \Request::all()
            ]);
        } catch (Exception $e) {
            return format_response([
                'message' => $e->getMessage()
            ]);
        }
    }

}
