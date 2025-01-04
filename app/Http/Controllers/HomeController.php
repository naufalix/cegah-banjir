<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Models\Division;
// use App\Models\Faq;
use App\Models\Meta;
// use App\Models\Post;
// use App\Models\Testimonial;

class HomeController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        return $meta;
    }

    public function index(){
        return view('home',[
            "meta" => $this->meta(),
            // "divisions" => Division::orderBy('id', 'ASC')->get(),
            // "faqs" => Faq::whereShow(1)->orderBy('sort', 'ASC')->get(),
            // "posts" => Post::orderBy('date', 'DESC')->limit(3)->get(),
            // "testimonials" => Testimonial::orderBy('updated_at', 'DESC')->get(),
        ]);
    }

    // public function daikachan(){
    //     $meta = $this->meta();
    //     $meta['url'] = "https://daikazoku.ub.ac.id";
    //     $meta['title'] = "Meet Daika-chan";
    //     $meta['description'] = "Kenalin, maskot terbaru Dai Kazoku, DAIKA-CHAN! Si cantik yang ramah dan penuh ceria.";
    //     $meta['image'] = "/assets/img/static/daika-chan.webp";
    //     return view('daika-chan',[
    //         "meta" => $meta,
    //         "divisions" => Division::orderBy('id', 'ASC')->get(),
    //     ]);
    // }

    // public function display(){
    //     $meta = $this->meta();
    //     $meta['title'] = "Dai Kazoku | Gallery";
    //     return view('display',[
    //         "meta" => $meta,
    //         "divisions" => Division::orderBy('id', 'ASC')->get(),
    //     ]);
    // }

    // public function link(){
    //     $meta = $this->meta();
    //     $meta['title'] = "Dai Kazoku | Link";
    //     return view('link',[
    //         "meta" => $meta,
    //         "divisions" => Division::orderBy('id', 'ASC')->get(),
    //     ]);
    // }

}
