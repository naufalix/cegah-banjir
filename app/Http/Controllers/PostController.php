<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private function meta(){
        $meta = Meta::getDataMeta();
        return $meta;
    }

    public function blog(){
        return view('blog',[
            "meta" => $this->meta(),
            "posts" => Post::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function filter(Request $request)
    {
        // Get keyword from request
        $keyword = $request->get('keyword');

        // Query posts dengan filter berdasarkan title atau body
        $posts = Post::where('title', 'like', "%{$keyword}%")->orWhere('body', 'like', "%{$keyword}%")->orderBy('id', 'DESC')->get();

        return view('blog', [
            "meta" => $this->meta(),
            "posts" => $posts,
        ]);
    }

    public function post(Post $post){  
        $meta = $this->meta();
        $meta['title'] = $post->title;
        return view('post',[
            "meta" => $meta,
            "post" => $post,
            "posts" => Post::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

}
