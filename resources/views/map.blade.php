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
      <a href="/dashboard/lapor-banjir">
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
    center: [-2.2, 118],
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
            Pelapor: <a href="/kolaborator/${risk.user.username}">${risk.user.name}</a><br>
            <br>
            <a class='btn btn-success text-white py-1 px-3' href="/laporan/${flood.id}"'>Detail laporan</a>
          </div>
        `;

        // Bind the popup to the marker
        marker.bindPopup(popupContent);
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