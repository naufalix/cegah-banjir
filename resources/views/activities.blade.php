@extends('layouts.index')

@section('content')
<section id="home-post" class="section bg-light">

  <div class="container section-title" data-aos="fade-up">
    <h2>Kegiatan</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>

  <div class="container px-md-5">

    <div class="row">
      
      @foreach ($activities as $a)
      @php
        $start = date_create($a->start_date);
      @endphp
      <div class="col-md-3">
        <div class="card position-relative" style="border-radius:20px;">
          <div class="card-body" style="border-radius:20px; padding: 20px">
            <img class="mb-3" src="/assets/img/activity/{{$a->image}}"
            style="border-radius:10px; width: 100%; aspect-ratio: 16/9; object-fit: cover;">
            <div class="">
              <h5 class="fw-bold" style="font-size: 18px">
                <a href="/kegiatan/{{$a->id}}">{{$a->name}}</a>
              </h5>
              <p class="mb-0" style="font-size: 14px"><i class="bi bi-geo-alt-fill me-2"></i>{{$a->location}}</p>
              <p class="mb-0" style="font-size: 14px"><i class="bi bi-calendar-event me-2"></i>{{date_format($start,"d F Y")}}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>  

  </div>

</section>
@endsection
