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
      <a href="/dashboard/lapor-dampak">
        <button class="rounded bg-white" style="width: 100%">Buat laporan</button>
      </a>
    </div>
  </div>
  <div id="map" class="" style="width: 100%; height: 80vh;"></div>
</section>

<!-- Modal -->
<div class="modal fade" id="solusi" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rekomendasi solusi dari AI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol id="rekomendasi">
          
        </ol>
      </div>
    </div>
  </div>
</div>
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
    url: "/api/impacts",
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      var mydata = response.data;

      // Loop through the data and add markers with the respective icon
      mydata.forEach(function(impact) {
        // Get the custom icon for the flood's cause_id, or a default icon if not mapped
        // var customIcon = L.icon({
        //   iconUrl: '/assets/img/marker/'+flood.cause_id+'.png',
        //   iconSize: [20, 32],
        //   iconAnchor: [16, 32],
        //   popupAnchor: [0, -32]
        // });

        // Create a marker with the custom icon
        // var marker = L.marker([flood.latitude, flood.longitude], { icon: customIcon }).addTo(map);
        var marker = L.marker([impact.latitude, impact.longitude]).addTo(map);

        // Create a popup for the marker
        var popupContent = `
          <div class="my-3">
            <img class="mb-2 rounded" src="/assets/img/impact/${impact.image}" style="width:100%; aspect-ratio: 16/9; object-fit: cover">
            <b>${impact.name}</b><br>
            Deskripsi: ${impact.description}<br>
            Pelapor: <a href="/kolaborator/${impact.user.username}">${impact.user.name}</a><br>
            Harapan bantuan: ${impact.assistance_needed}<br>
            <br>
            <a class='btn btn-success text-white py-1 px-3' href="/dampak-banjir/${impact.id}"' style="font-size:10px">Detail laporan</a>
            
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

 
  function solution(cause_id) {
    $.ajax({
      url: "/data/solutions/" + cause_id + ".json",
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Shuffle the data to randomize it
        var shuffledData = response.sort(() => 0.5 - Math.random());
        
        // Get the first two items
        var randomData = shuffledData.slice(0, 2);
        
        // Clear the current list
        $("#rekomendasi").empty();
        
        // Populate the list with the random data
        randomData.forEach(function(item) {
          $("#rekomendasi").append(`
            <li>
              <p class="mb-0 fw-bold">${item.title}</p>
              <p>${item.body}</p>
            </li>
          `);
        });
      },
      error: function(xhr, status, error) {
        console.error("Error fetching data:", error);
      }
    });
  }


  

</script>

@endsection