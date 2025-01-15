@extends('layouts.index')

@section('content')
<!-- Portfolio Details Section -->
<section id="" class="section">

  <div class="container px-md-5" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8">
        <h3 class="fw-bold mb-4">{{$risk->title}}</h3>
        <div class="row">
          <div class="col-12">
            <div id="map" class="rounded" style="width: 100%; aspect-ratio: 16 / 10;"></div>
          </div>
        </div>
        
        <p>{{$risk->description}}</p>
        
      </div>

      <div class="col-lg-4">
        <div class="card" data-aos="fade-up" data-aos-delay="200" style="border-radius:16px; padding: 20px">
          <h3 class="fw-bold mb-0" style="font-size: 20px;">Detail laporan</h3>
          <hr>
          <p class="mb-0" style="font-size: 14px"><strong>Pelapor</strong> : {{$risk->user->name}}</p>
          <br>
          <a href="/kolaborator/{{$risk->user->username}}" class="btn btn-success">Profil kolaborator</a>
        </div>
        <h3 class="fw-bold mt-4 mb-3" style="font-size: 20px;">Laporan lainnya</h3>
        @foreach ($risks as $r)
        <a href="/laporan/{{$r->id}}" data-aos="fade-up" data-aos-delay="200" >
          <div class="card mb-3" style="border-radius:20px; padding: 20px">
            <p class="mb-0">{{$r->title}}</p>
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
    center: [{{$risk->latitude}}, {{$risk->longitude}}],
    zoom: {{$risk->city->zoom}}
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  
  // Tambahkan lingkaran dengan efek transparan
  var circle = L.circle([{{$risk->latitude}}, {{$risk->longitude}}], {
      color: 'none',       // Hilangkan border
      fillColor: 'red',    // Warna isi lingkaran
      fillOpacity: 0.3,    // Transparansi isi lingkaran
      radius: {{$risk->area}}          // Radius lingkaran dalam meter
  }).addTo(map);

</script>
@endsection
