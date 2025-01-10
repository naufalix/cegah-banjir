<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\Activity;

class ActivityController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        return $meta;
    }

    public function index(){
        return view('activities',[
            "meta" => $this->meta(),
            "activities" => Activity::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function activity(Activity $activity){  
        $meta = $this->meta();
        $meta['title'] = $activity->name;
        return view('activity',[
            "meta" => $meta,
            "activity" => $activity,
            "activities" => Activity::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

}
