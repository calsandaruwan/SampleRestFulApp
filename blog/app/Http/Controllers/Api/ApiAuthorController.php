<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
Use App\Interfaces\AuthorInterface;

class ApiAuthorController extends BaseController {

    private $author;

    public function __construct(AuthorInterface $authorInterface) {
        $this->author = $authorInterface;
    }

    public function createAuthor() {
        $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make(\Request::all(), $rules);

        if ($validator->passes()) {
            $result = $this->author->create(\Request::all());
            if ($result) {
                return $result;
            }
            return false;
        } else {
            return $validator->getMessageBag()->toArray();
        }
    }

}
