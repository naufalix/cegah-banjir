@extends('layouts.dashboard')

@section('content')
<!--begin::Card-->
<div class="card mb-2">
  <!--begin::Card Body-->
  <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
    <!--begin::Section-->
      <div class="px-md-10 pt-md-10 pb-md-5">
        <!--begin::Block-->
        <div class="text-center mb-20">
          <h1 class="fs-2tx fw-bolder mb-8" contenteditable="true">
          Welcome
          <span class="d-inline-block position-relative ms-2">
            <span class="d-inline-block mb-2">{{ Auth::user()->name }}</span>
            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-primary translate rounded"></span>
          </span></h1>
          
          <div class="row justify-content-center">
            @php
              $statistics = [
                (object) ['name'=>'Laporan Penyebab banjir',  'icon'=>'bi bi-droplet-half',     'url'=>'/dashboard/lapor-banjir',   'count' => $count_flood,],
                (object) ['name'=>'Laporan Daerah rawan',     'icon'=>'bi bi-map-fill',         'url'=>'/dashboard/lapor-rawan',    'count' => $count_risk,],
                (object) ['name'=>'Laporan Dampak banjir',    'icon'=>'bi bi-cloud-rain-heavy', 'url'=>'/dashboard/lapor-dampak',   'count' => $count_impact,],
                (object) ['name'=>'Artikel edukasi',          'icon'=>'mdi mdi-lead-pencil',    'url'=>'/dashboard/artikel',        'count' => $count_post,],
                (object) ['name'=>'Kegiatan',                 'icon'=>'fa fa-calendar',         'url'=>'/dashboard/kegiatan',       'count' => $count_activity,],
                (object) ['name'=>'Tindak lanjut',            'icon'=>'fa fa-check-circle-o',   'url'=>'/dashboard/tindak-lanjut',  'count' => $count_followup,],
              ];
            @endphp

            @foreach ($statistics as $s)
            <div class="col-md-3 mb-4">
              <a href="{{$s->url}}" class="card border border-2">
                <div class="card-body d-flex align-items">
                  <span class="my-auto"><i class="{{$s->icon}} fs-1"></i></span>
                  <span class="ms-3 my-auto text-gray-700 fs-6 fw-bold">{{$s->name}}</span>
                  <span class="fs-1 ms-auto">{{$s->count}}</span>
                </div>
              </a>
            </div>
            @endforeach
          </div>

        </div>
        <!--end::Block-->
      </div>
    <!--end::Section-->
  </div>
  <!--end::Card Body-->
</div>
<!--end::Card-->
@endsection