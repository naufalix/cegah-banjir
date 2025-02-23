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
@endsection

@section('script')

<script>
  // Initialize leaflet
  var map = L.map('map', {
    center: [-2.0, 114],
    zoom: 5
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

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
          <div class="my-3">
            <img class="mb-2 rounded" src="/assets/img/flood/${flood.image}" style="width:100%; aspect-ratio: 16/9; object-fit: cover">
            <b>${flood.title}</b><br>
            Deskripsi: ${flood.description}<br>
            Penyebab: <span class="badge" style="background-color: ${flood.cause.color}">${flood.cause.name}</span><br>
            Pelapor: <a href="/kolaborator/${flood.user.username}">${flood.user.name}</a><br>
            <br>
            <a class='btn btn-success text-white py-1 px-3' href="/laporan/${flood.id}"' style="font-size:10px">Detail laporan</a>
          </div>
        `;

        // Bind the popup to the marker
        marker.bindPopup(popupContent);
      });
    }
  });

  ////////

  // Initialize leaflet
  var map2 = L.map('map2', {
    center: [-7.0, 110.4],
    zoom: 11
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map2);

  // Set leaflet circle
  $.ajax({
    url: "/api/risks",
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      var mydata = response.data;

      // Loop through the data and add markers with the respective icon
      mydata.forEach(function(risk) {
        
        // Tambahkan lingkaran dengan efek transparan
        var circle = L.circle([risk.latitude, risk.longitude], {
            color: 'none',       // Hilangkan border
            fillColor: 'red',    // Warna isi lingkaran
            fillOpacity: 0.3,    // Transparansi isi lingkaran
            radius: risk.area          // Radius lingkaran dalam meter
        }).addTo(map2);
        
        // Create a popup for the marker
        var popupContent = `
          <div class="my-3">
            <img class="mb-2 rounded" src="/assets/img/risk/${risk.image}" style="width:100%; aspect-ratio: 16/9; object-fit: cover">
            <b>${risk.title}</b><br>
            Deskripsi: ${risk.description}<br>
            Luas area banjir: ${risk.area}m²<br>
            Tanggal banjir: ${risk.date}<br>
            Pelapor: <a href="/kolaborator/${risk.user.username}">${risk.user.name}</a><br>
            <br>
            <a class='btn btn-success text-white py-1 px-3' href="/daerah-rawan/${risk.id}"' style="font-size:10px">Detail laporan</a>
          </div>
        `;

        // Bind the popup to the marker
        circle.bindPopup(popupContent);
      });
    }
  });

  ////////

  // Initialize leaflet
  var map3 = L.map('map3', {
    center: [-7.97, 112.62],
    zoom: 12
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map3);


  // Set leaflet marker
  $.ajax({
    url: "/api/impacts",
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      var mydata = response.data;

      // Loop through the data and add markers with the respective icon
      mydata.forEach(function(impact) {
 
        // Create a marker with the custom icon
        var marker = L.marker([impact.latitude, impact.longitude]).addTo(map3);

        // Create a popup for the marker
        var popupContent = `
          <div class="my-3">
            <img class="mb-2 rounded" src="/assets/img/impact/${impact.image}" style="width:100%; aspect-ratio: 16/9; object-fit: cover">
            <b>${impact.name}</b><br>
            Deskripsi: ${impact.description}<br>
            Pelapor: <a href="/kolaborator/${impact.user.username}">${impact.user.name}</a><br>
            Harapan bantuan: ${impact.assistance_needed}<br>
            <br>
            <a class='btn btn-success d-none text-white py-1 px-3' href="/laporan/${impact.id}"' style="font-size:10px">Detail laporan</a>
            
          </div>
        `;

        // Bind the popup to the marker
        marker.bindPopup(popupContent);
      });
    }
  });

  ////////

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