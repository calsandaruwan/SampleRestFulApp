<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Author;


class ApiAuthorController extends BaseController
{

    private $author;

    public function __construct(Author $author) {
        $this->author = $author;
    }
    
    public function createAuthor(){
        $rules = array(
                'name' => 'required',
            );

            $validator = Validator::make(\Request::all(), $rules);

            if ($validator->passes()) {
                $this->author->name = \Request::get('name');
                if ($this->author->save()) {
                    return $this->author;
                }
            } else {
                return $validator->getMessageBag()->toArray();
            }
    }
    
}
