@extends('layouts.index')

@section('content')
<section id="home-post" class="section bg-light">

  <div class="container section-title pb-3" data-aos="fade-up">
    <h2>Kegiatan</h2>
    <p>Ikuti aksi nyata untuk lingkungan lebih baik</p>
    <div class="text-center mt-4">
      <a class="btn btn-success" href="/dashboard/kegiatan">Buat kegiatan</a>
    </div> 
  </div>

  <div class="container px-md-5">

    <form method="post">
      @csrf
      <div class="row col-md-6 mx-auto justify-content-center">
        <div class="col-8 col-md-8">
          <select class="form-select" id="city" name="city_id" style="border-radius: 20px; height: 100%;">
            <option value="" selected disabled>- Pilih kota -</option>
            @foreach ($cities as $c)
              <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-4 col-md-2">
          <button type="submit" class="btn btn-success col-12">FIlter</button>
        </div>
      </div>
    </form>

    <br>

    <div class="row">  
      @foreach ($activities as $a)
      @php
        $start = date_create($a->start_date);
      @endphp
      <div class="col-md-3">
        <div class="card position-relative mb-4" style="border-radius:20px;">
          <div class="card-body" style="border-radius:20px; padding: 20px">
            <img class="mb-3" src="/assets/img/activity/{{$a->image}}"
            style="border-radius:10px; width: 100%; aspect-ratio: 16/9; object-fit: cover;">
            <div class="">
              <h5 class="fw-bold" style="font-size: 18px">
                <a href="/kegiatan/{{$a->id}}">{{$a->name}}</a>
              </h5>
              @if ($a->city)
              <span class="badge bg-success mb-2">{{$a->city->name}}</span>
              @endif
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
