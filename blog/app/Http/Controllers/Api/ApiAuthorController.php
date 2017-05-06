<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
Use App\Interfaces\AuthorInterface;
Use Exception;

class ApiAuthorController extends BaseController {

    private $author;

    public function __construct(AuthorInterface $authorInterface) {
        $this->author = $authorInterface;
    }

    public function createAuthor() {
        try {
            $rules = array(
                'name' => 'required',
            );

            $validator = Validator::make(\Request::all(), $rules);

            if ($validator->passes()) {
                $result = $this->author->create(\Request::all());
                if ($result) {
                    return $result;
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

}
