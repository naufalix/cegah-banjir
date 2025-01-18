@extends('layouts.index')

@section('content')
<!-- Portfolio Details Section -->
<section id="" class="section">

  <div class="container px-md-5" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8">
        <h3 class="fw-bold mb-4">{{$flood->title}}</h3>
        <div class="row">
          <div class="col-6">
            <img class="mb-4 img-fluid services-img border rounded" src="/assets/img/flood/{{$flood->image}}" alt="" style="width:100%; aspect-ratio: 16/10; object-fit: cover">
          </div>
          <div class="col-6">
            <div id="map" class="rounded" style="width: 100%; aspect-ratio: 16 / 10;"></div>
          </div>
        </div>
        <p>{{$flood->description}}</p>
        @include('sections.form-report') 
      </div>

      <div class="col-lg-4">
        <div class="card" data-aos="fade-up" data-aos-delay="200" style="border-radius:16px; padding: 20px">
          <h3 class="fw-bold mb-0" style="font-size: 20px;">Detail laporan</h3>
          <hr>
          <p class="mb-0" style="font-size: 14px"><strong>Penyebab</strong> : {{$flood->cause->name}}</p>
          <p class="mb-0" style="font-size: 14px"><strong>Pelapor</strong> : {{$flood->user->name}}</p>
          <br>
          <a href="/kolaborator/{{$flood->user->username}}" class="btn btn-success">Profil kolaborator</a>
        </div>
        <h3 class="fw-bold mt-4 mb-3" style="font-size: 20px;">Laporan lainnya</h3>
        @foreach ($floods as $f)
        <a href="/laporan/{{$f->id}}" data-aos="fade-up" data-aos-delay="200" >
          <div class="card mb-3" style="border-radius:20px; padding: 20px">
            <p class="mb-0">{{$f->title}}</p>
          </div>
        </a>
        @endforeach
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->
@endsection

@section('script')
<script>
  var map = L.map('map', {
    center: [{{$f->latitude}}, {{$f->longitude}}],
    zoom: 5
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  
  var customIcon = L.icon({
    iconUrl: '/assets/img/marker/'+{{$f->cause->id}}+'.png',
    iconSize: [20, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32]
  });

  // Create a marker with the custom icon
  var marker = L.marker([{{$f->latitude}}, {{$f->longitude}}], { icon: customIcon }).addTo(map);

</script>
@endsection
