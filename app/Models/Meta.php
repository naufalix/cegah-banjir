<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public static function getAppName(){
        return str_replace("_", " ", env('APP_NAME'));
    }

    public static function getDataMeta() {
        return [
            'app_name'    => self::getAppName(),
            'description' => 'Lorem ipsum',
            'keywords'    => self::getAppName().', Cegah Banjir, Banjir, Lingkungan',
            'type'        => 'page',
            'title'       => self::getAppName().' | Platform edukasi pencegahan banjir',
            'site_name'   => self::getAppName().' | Platform edukasi pencegahan banjir',
            'image'       => '/assets/img/static/logo.webp'
        ];
    }

}
