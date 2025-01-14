@extends('layouts.index')

@section('content')
<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

  <div class="container px-md-5" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8 row">
        <div class="col-md-4">
          <img class="rounded-circle" src="/assets/img/user/{{$user->image}}" style="width: 100%">
        </div>
        <div class="col-md-8">
          <p class="mb-0 fw-bold">{{$user->name}} ({{$user->type}})</p>
          <p class="">{{$user->location}}</p>
          
          <p class="">{{$user->description}}</p>
        </div>
        <div class="col-12">
          Jumlah laporan : {{$user->flood->count()+$user->risk->count()}}
        </div>
      </div>

      <div class="col-lg-4">
        <h3 class="fw-bold mt-4 mb-3" style="font-size: 20px;">Collaborator terbaru</h3>
        @foreach ($users as $u)
        <a href="/collaborator/{{$u->username}}" data-aos="fade-up" data-aos-delay="200" >
          <div class="card mb-3" style="border-radius:20px; padding: 20px">
            <p class="mb-0">{{$u->name}}</p>
          </div>
        </a>
        @endforeach
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->
@endsection
