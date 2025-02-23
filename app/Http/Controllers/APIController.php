<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Activity;
use App\Models\Assistance;
use App\Models\City;
use App\Models\Flood;
use App\Models\FollowUp;
use App\Models\Impact;
use App\Models\Post;
use App\Models\Risk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
  public function city(City $city){  
    return ApiFormatter::createApi(200,"Success",$city);
  }
  public function activity(Activity $activity){  
    return ApiFormatter::createApi(200,"Success",$activity);
  }
  public function assistance(Assistance $data){  
    return ApiFormatter::createApi(200,"Success",$data);
  }
  public function flood($id){
    $flood = Flood::whereId($id)->with('city')->first();  
    return ApiFormatter::createApi(200,"Success",$flood);
  }
  public function floods(){
    $floods = Flood::with('cause','user')->get();
    return ApiFormatter::createApi(200, "Success", $floods);
  }
  public function followUp(FollowUp $data){
    return ApiFormatter::createApi(200,"Success",$data);
  }
  public function impact(Impact $data){
    return ApiFormatter::createApi(200,"Success",$data);
  }
  public function impacts(){
    $impacts = Impact::with('user')->get();
    return ApiFormatter::createApi(200, "Success",$impacts);
  }
  public function post(Post $post){  
    return ApiFormatter::createApi(200,"Success",$post);
  }
  public function risk($id){
    $risk = Risk::whereId($id)->with('city')->first();  
    return ApiFormatter::createApi(200,"Success",$risk);
  }
  public function risks(){
    $risks = Risk::with('city','user')->get();
    return ApiFormatter::createApi(200, "Success", $risks);
  }
}
