<!-- Services Section -->
<section id="services" class="services section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Statistik {{ $meta['app_name'] }}</h2>
    <p>Lihat data terkini dan ambil langkah nyata untuk mencegah banjir</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4 justify-content-center">

      @php
        $statistics = [
          (object) ['name'=>'Penyebab banjir',      'icon'=>'bi bi-geo-alt',                  'url'=>'/peta-banjir',        'count' => $count_cause-1,],
          (object) ['name'=>'Daerah rawan banjir',  'icon'=>'bi bi-map-fill',                 'url'=>'/peta-daerah-rawan',  'count' => $count_risk,],
          (object) ['name'=>'Dampak banjir',        'icon'=>'bi bi-cloud-rain-heavy',         'url'=>'/peta-dampak-banjir', 'count' => $count_impact,],
          (object) ['name'=>'Kolaborator',          'icon'=>'bi bi-person-fill',              'url'=>'/kolaborator',        'count' => $count_user,],
          (object) ['name'=>'Laporan',              'icon'=>'bi bi-file-earmark-text-fill',   'url'=>'/laporan-banjir',     'count' => $count_risk+$count_flood,],
          (object) ['name'=>'Artikel edukasi',      'icon'=>'bi bi-book-half',                'url'=>'/artikel',            'count' => $count_post,],
          (object) ['name'=>'Kegiatan',             'icon'=>'bi bi-calendar2-week',           'url'=>'/kegiatan',           'count' => $count_activity,],
        ];
      @endphp

      @foreach ($statistics as $s)
        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{$loop->iteration}}00">
          <div class="card col-12 service-item position-relative py-3">
            
            <div class="row">
              <div class="col-3">
                <div class="icon"><i class="{{$s->icon}} icon"></i></div>
              </div>
              <div class="col-9">
                <p class="fs-3 mb-2">{{$s->count}}+</p>
                <h4 class="mb-0 fs-6"><a href="{{$s->url}}" class="stretched-link">{{$s->name}}</a></h4>
              </div>
            </div>
          
          </div>
        </div>
      @endforeach

     

    </div>

  </div>

</section><!-- /Services Section -->