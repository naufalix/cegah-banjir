<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Cause;
use App\Models\Flood;
use App\Models\Meta;
use App\Models\Post;
use App\Models\Risk;
use App\Models\User;

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
            "count_activity" => Activity::all()->count(),
            "count_cause" => Cause::all()->count(),
            "count_flood" => Flood::all()->count(),
            "count_post" => Post::all()->count(),
            "count_risk" => Risk::all()->count(),
            "count_user" => User::all()->count(),
        ]);
    }

    public function map(){
        $meta = $this->meta();
        $meta['title'] = $post->title;
        return view('map',[
            "meta" => $meta,
        ]);
    }

    public function map2(){
        $meta = $this->meta();
        $meta['title'] = $post->title;
        return view('map2',[
            "meta" => $meta,
        ]);
    }

}
