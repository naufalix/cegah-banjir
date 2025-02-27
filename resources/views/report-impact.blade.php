@extends('layouts.index')

@section('content')
<!-- Portfolio Details Section -->
<section id="" class="section">

  <div class="container px-md-5" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8">
        <h3 class="fw-bold mb-4">{{$impact->name}}</h3>
        <div class="row">
          <div class="col-6">
            <img class="mb-4 img-fluid services-img border rounded" src="/assets/img/impact/{{$impact->image}}" alt="" style="width:100%; aspect-ratio: 16/10; object-fit: cover">
          </div>
          <div class="col-6">
            <div id="map" class="rounded" style="width: 100%; aspect-ratio: 16 / 10;"></div>
          </div>
        </div>
        <p>{{$impact->description}}</p>
        
        @if ($impact->assistance)
        <p class="h5 fw-bold text-success">Riwayat bantuan :</p>
        <table class="mt-3 table table-bordered">
            <tr>
              <th>Tanggal</th>
              <th>Deskripsi</th>
              <th>Pemberi bantuan</th>
              <th>Foto</th>
            </tr>
            @foreach($impact->assistance as $ia)
            <tr>
              <td>{{ $ia->created_at }}</td>
              <td>{{ $ia->description }}</td>
              <td>{{ $ia->provider }}</td>
              <td data-bs-toggle="modal" data-bs-target="#foto" onclick="foto('{{ $ia->image }}','assistance')">
                <span class="badge bg-success" style="cursor: pointer">
                  Lihat foto
                </span>
              </td>
            </tr>
            @endforeach
          </table>
        @endif

        @include('sections.form-report') 

      </div>

      <div class="col-lg-4">
        <div class="card" data-aos="fade-up" data-aos-delay="200" style="border-radius:16px; padding: 20px">
          <h3 class="fw-bold mb-0" style="font-size: 20px;">Detail laporan</h3>
          <hr>
          <p class="mb-0" style="font-size: 14px"><strong>Pelapor</strong> : {{$impact->user->name}}</p>
          <p class="mb-0" style="font-size: 14px"><strong>Melaporkan sebagai</strong> : {{$impact->type}}</p>
          <p class="mb-0" style="font-size: 14px"><strong>Alamat</strong> : {{$impact->address}}</p>
          <br>
          <a href="/kolaborator/{{$impact->user->username}}" class="btn btn-success">Profil kolaborator</a>
        </div>
        <h3 class="fw-bold mt-4 mb-3" style="font-size: 20px;">Laporan lainnya</h3>
        @foreach ($impacts as $f)
        <a href="/dampak-banjir/{{$f->id}}" data-aos="fade-up" data-aos-delay="200" >
          <div class="card mb-3" style="border-radius:20px; padding: 20px">
            <p class="mb-0">{{$f->name}}</p>
          </div>
        </a>
        @endforeach
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->

<div class="modal fade" tabindex="-1" id="foto">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-6" id="ft">View image</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-auto p-0" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="modal-body d-flex">
          <img class="mx-auto" id="img-view" src="" style="height:100%; width: 100%">
        </div>
      </div>
  </div>
</div>

@endsection

@section('script')
<script>
  function foto(image,path){
    $("#img-view").attr("src","/assets/img/"+path+"/"+image);
  }

  var map = L.map('map', {
    center: [{{$impact->latitude}}, {{$impact->longitude}}],
    zoom: {{$impact->city->zoom}}
  });

  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  
  // Create a marker with the custom icon
  var marker = L.marker([{{$impact->latitude}}, {{$impact->longitude}}]).addTo(map);

</script>
@endsection
