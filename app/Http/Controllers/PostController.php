<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\Post;

class PostController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        return $meta;
    }

    public function blog(){
        return view('blog',[
            "meta" => $this->meta(),
            "posts" => Post::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function post(Post $post){  
        $meta = $this->meta();
        $meta['title'] = $post->title;
        return view('post',[
            "meta" => $meta,
            "post" => $post,
        ]);
    }

}
