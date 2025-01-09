<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Meta;
use App\Models\Post;

class HomeController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        return $meta;
    }

    public function index(){
        return view('home',[
            "meta" => $this->meta(),
            "posts" => Post::orderBy('id', 'DESC')->limit(3)->get(),
            "activities" => Activity::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

    public function map(){
        return view('map',[
            "meta" => $this->meta(),
        ]);
    }

}
