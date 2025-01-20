<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\Activity;
use App\Models\City;
use Illuminate\Http\Request;

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
            "cities" => City::whereNotNull('latitude')->orderBy('name', 'ASC')->get(),
        ]);
    }

    public function filter(Request $request)
    {
        // Ambil nilai city_id dari request
        $cityId = $request->get('city_id');

        // Query activities dengan filter city_id jika tersedia
        $activities = Activity::when($cityId, function ($query, $cityId) {
            return $query->where('city_id', $cityId);
        })->orderBy('id', 'DESC')->get();

        return view('activities', [
            "meta" => $this->meta(),
            "activities" => $activities,
            "cities" => City::whereNotNull('latitude')->orderBy('name', 'ASC')->get(),
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
