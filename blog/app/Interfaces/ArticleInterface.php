<?php

namespace App\Interfaces;

interface ArticleInterface{
    
    public function getAll();
    public function get($id);
    public function create();
    public function edit($id);
    public function delete($id);

}