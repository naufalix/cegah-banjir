<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Activiity;
use App\Models\Flood;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
  
  public function activity(Activity $activity){  
    return ApiFormatter::createApi(200,"Success",$activity);
  }
  public function floods(){
    return ApiFormatter::createApi(200,"Success",Flood::all());
  }
  public function flood(Flood $flood){  
    return ApiFormatter::createApi(200,"Success",$flood);
  }
  public function post(Post $post){  
    return ApiFormatter::createApi(200,"Success",$post);
  }
}
