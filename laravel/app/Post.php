<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    public function insertPost(Request $req){
        $this->image = $req->image;
        $this->description = $req->description;
        $this->likes = $req->likes;
        $this->save();
    }

    public function updatePost(Request $req){
        if ($req->image)
            $this->image = $req->image;
        if ($req->description)
            $this->description = $req->description;
        if ($req->likes)
            $this->likes = $req->likes;
        $this->save();
    }
}
