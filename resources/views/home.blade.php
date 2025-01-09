@extends('layouts.index')

@section('content')
  @include('sections.hero') 
  @include('sections.services') 
  @include('sections.home-map') 
  @include('sections.home-collab') 
  @include('sections.home-report') 
  @include('sections.home-post') 
  @include('sections.home-activity') 
  @include('sections.home-testimonial') 
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

  // Set leaflet marker
  $.ajax({
    url: "/api/floods",
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      var mydata = response.data;

      // Loop through the data and add markers with the respective icon
      mydata.forEach(function(flood) {
        // Get the custom icon for the flood's cause_id, or a default icon if not mapped
        var customIcon = L.icon({
          iconUrl: '/assets/img/marker/'+flood.cause_id+'.png',
          iconSize: [20, 32],
          iconAnchor: [16, 32],
          popupAnchor: [0, -32]
        });

        // Create a marker with the custom icon
        var marker = L.marker([flood.latitude, flood.longitude], { icon: customIcon }).addTo(map);

        // Create a popup for the marker
        var popupContent = `
          <b>${flood.title}</b><br>
          ${flood.description}<br>
          Deskripsi: ${flood.description}<br>
          Penyebab: ${flood.cause.name}<br>
          <button class='btn btn-sm btn-primary' onclick='pergi(${flood.id})'>Pergi</button>
        `;

        // Bind the popup to the marker
        marker.bindPopup(popupContent);
      });
    }
  });

  var swiper3 = new Swiper(".mySwiper3", {
    slidesPerView: 1,
    spaceBetween: 30,
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      640: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
    navigation: {
      nextEl: ".testimonial-next",
      prevEl: ".testimonial-prev",
    },
  });
</script>

@endsection