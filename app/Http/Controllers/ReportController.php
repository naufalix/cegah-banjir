<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\Flood;
use App\Models\Risk;

class ReportController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        return $meta;
    }

    public function index(){
        $meta = $this->meta();
        $meta['title'] = "Cegah Banjir | Laporan penyebab banjir";
        return view('report',[
            "meta" => $meta,
            "floods" => Flood::orderBy('id', 'DESC')->get(),
            "risks" => Risk::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function flood(Flood $flood){  
        $meta = $this->meta();
        $meta['title'] = $flood->title;
        return view('report-flood',[
            "meta" => $meta,
            "flood" => $flood,
            "floods" => Flood::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

    public function risk(Risk $risk){  
        $meta = $this->meta();
        $meta['title'] = $risk->title;
        return view('report-risk',[
            "meta" => $meta,
            "risk" => $risk,
            "risks" => Risk::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

}
