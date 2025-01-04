<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    
    public static $data_meta = [
        'description' => 'Lorem ipsum',
        'keywords'    => 'Cegah Banjir, Banjir, Lingkungan',
        'type'        => 'page',
        'title'       => 'Cegah Banjir | Platform edukasi pencegahan banjir',
        'site_name'   => 'Cegah Banjir | Platform edukasi pencegahan banjir',
        'image'       => '/assets/img/static/logo.webp'
    ];

}
