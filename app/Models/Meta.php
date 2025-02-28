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
            'description' => 'Kolaborasi antara pemerintah dan masyarakat penting untuk mengurangi risiko banjir. Platform ini menyediakan alat dan informasi untuk bersama-sama mengatasi penyebab dan peduli dampak banjir. Mari menciptakan lingkungan yang lebih aman dan bersih!',
            'keywords'    => self::getAppName().', Cegah Banjir, Banjir, Lingkungan',
            'type'        => 'page',
            'title'       => self::getAppName().' | Platform edukasi pencegahan banjir',
            'site_name'   => self::getAppName().' | Platform edukasi pencegahan banjir',
            'image'       => '/assets/img/static/logo.webp'
        ];
    }

}
