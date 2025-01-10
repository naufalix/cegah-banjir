@extends('layouts.index')

@section('content')
<!-- Portfolio Details Section -->
<section id="" class="section">

  <div class="container px-md-5" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8">
        <h3 class="fw-bold mb-4">{{$activity->name}}</h3>
        <img class="mb-4 img-fluid services-img border rounded" src="/assets/img/activity/{{$activity->image}}" alt=""
        style="width:100%; aspect-ratio: 16/9; object-fit: cover">
        <p>{{$activity->description}}</p>
        @php
          $sd = date_create($activity->start_date);
          $ed = date_create($activity->end_date);
        @endphp
        <p class="mb-0"><i class="bi bi-calendar-event"></i> {{date_format($sd,"d/m/Y")}} - {{date_format($ed,"d/m/Y")}}</p>
        <p><i class="bi bi-geo-alt"></i> {{$activity->location}}</p>
      </div>

      <div class="col-lg-4">
        <div class="card mb-3" data-aos="fade-up" data-aos-delay="200" style="border-radius:16px; padding: 20px">
          <h3 class="fw-bold mb-0" style="font-size: 20px;">Informasi kegiatan</h3>
          <hr>
          <p class="mb-0" style="font-size: 14px"><strong>Penyelenggara</strong> : {{$activity->organizer}}</p>
          <p class="mb-0" style="font-size: 14px"><strong>Penanggungjawab</strong> : {{$activity->pic_name}}</p>
          <p class="mb-0" style="font-size: 14px"><strong>No telepon</strong> : {{$activity->phone}}</p>
        </div>
        <h3 class="fw-bold mt-4 mb-3" style="font-size: 20px;">Kegiatan lainnya</h3>
        @foreach ($activities as $a)
        <a href="/kegiatan/{{$a->id}}" data-aos="fade-up" data-aos-delay="200" >
          <div class="card" style="border-radius:20px; padding: 20px">
            <p class="mb-0">{{$a->name}}</p>
          </div>
        </a>
        @endforeach
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->
@endsection
