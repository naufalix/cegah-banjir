@extends('layouts.index')

@section('content')
  @include('sections.hero') 
  @include('sections.services') 
  @include('sections.home-map') 
  @include('sections.home-collab') 
  @include('sections.home-report') 
  @include('sections.home-post') 
  {{-- @include('sections.portfolio')  --}}
  {{-- @include('sections.faq')  --}}
  {{-- @include('sections.team')  --}}
  {{-- @include('sections.clients')  --}}
  {{-- @include('sections.contact')  --}}
@endsection

@section('script')

<script>
  // Initialize leaflet
  var map = L.map('map', {
    center: [-2.2, 118],
    zoom: 5
  });

  // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  // L.tileLayer.provider('Stadia.AlidadeSmoothDark').addTo(map);
  // L.tileLayer.provider('CyclOSM').addTo(map);
  // var CyclOSM = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
  //   maxZoom: 20,
  //   attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  // });
</script>

@endsection