<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\User;

class CollaboratorController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        return $meta;
    }

    public function index(){
        $meta = $this->meta();
        $meta['title'] = "Cegah Banjir | Kolaborator";
        return view('collaborators',[
            "meta" => $this->meta(),
            "users" => User::orderBy('point', 'DESC')->get(),
        ]);
    }

    public function user(User $user){  
        $meta = $this->meta();
        $meta['title'] = "Kolaborator | ".$user->name;
        return view('collaborator',[
            "meta" => $meta,
            "user" => $user,
            "users" => User::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

}
