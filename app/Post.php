<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public $table
    // public primarykey
    // public $table
    // public $timestamp = true

    // z poziomu Posta moge dostac sie do usera one to many inverse
    // $post = App\Post::find(1);
    // echo post->user->name;
    public function user(){
      return $this->belongsTo('App\User');
    }
}
