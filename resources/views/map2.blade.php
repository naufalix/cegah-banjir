@extends('layouts.index')

@section('content')

<section id="maps" class="section py-0">
  <div class="m-2" style="position: absolute;z-index: 1000;right: 0;">
    <div>
      <select class="rounded mb-2" name="" id="city1">
        <option value="" selected disabled>- Pilih kota -</option>
        @foreach ($cities as $c)
          <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
      </select>
      <br>
      <a href="/dashboard/lapor-rawan">
        <button class="rounded bg-white" style="width: 100%">Buat laporan</button>
      </a>
    </div>
  </div>
  <div id="map" class="" style="width: 100%; height: 80vh;"></div>
</section>
@endsection

@section('script')

<script>
  // Initialize leaflet
  var map = L.map('map', {
    center: [-7.3, 111.2],
    zoom: 8
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);


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
        }).addTo(map);
        
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
            <a class='btn btn-success text-white py-1 px-3' href="/daerah-rawan/${risk.id}"'>Detail laporan</a>
          </div>
        `;

        // Bind the popup to the marker
        circle.bindPopup(popupContent);
      });
    }
  });

  $(document).ready(function () {
    $('#city1').change(function () {
      $.ajax({
        url: "/api/city/"+this.value,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(response) {
          var mydata = response.data;
          map.panTo(new L.LatLng(mydata.latitude, mydata.longitude));
          map.setZoom(mydata.zoom);
          map.panTo(new L.LatLng(mydata.latitude, mydata.longitude));
        }
      });
    });
  });

</script>

@endsection