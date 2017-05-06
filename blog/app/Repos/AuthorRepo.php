<?php

namespace App\Repos;

use App\Interfaces\AuthorInterface;
use App\Author;

class AuthorRepo implements AuthorInterface {
    
    private $author;
    
    public function __construct(Author $author){
        $this->author = $author;
    }

    //create new author
    public function create() {
        $this->author->name = \Request::get('name');
        
        if ($this->author->save()) {
            return $this->author;
        }
        return false;
    }

}
