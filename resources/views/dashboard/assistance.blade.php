@extends('layouts.dashboard')

@section('content')

<div class="card mb-2">
  <!--begin::Card Body-->
  <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
    <!--begin::Section-->
    <div>
      <!--begin::Heading-->
      <div class="col-12 d-flex">
        <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Laporan dampak banjir</h1>
      </div>
      <!--end::Heading-->
      <!--begin::Block-->
      <div class="my-5 table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
              <th>No.</th>
              <th style="min-width: 150px">Nama</th>
              <th style="min-width: 150px">Alamat</th>
              <th style="min-width: 150px">Kota/kabupaten</th>
              <th style="min-width: 120px">Kebutuhan</th>
              <th style="min-width: 120px">Tanggal</th>
              <th style="min-width: 90px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($impacts as $i)
            @php
              $date = date_create($i->created_date);
            @endphp
            <tr>
              <td>{{$loop->iteration}}</td>
              <td style="min-width: 320px;">
                <div class="symbol symbol-30px me-5" data-bs-toggle="modal" data-bs-target="#foto" onclick="foto('{{ $i->image }}','impact')">
                  <img src="/assets/img/impact/{{ $i->image }}" class="h-30 align-self-center of-cover rounded-0" alt="">
                </div>
                {{ $i->name }} ({{ $i->type }})
              </td>
              <td>{{ $i->address }}</td>
              <td>
                <span class="badge badge-primary">{{ $i->city->name }}</span>
              </td>
              <td>{{ $i->assistance_needed }}</td>
              <td>{{date_format($date,"d/m/Y H:i")}}</td>
              <td>
                <a href="/dampak-banjir/{{ $i->id }}" class="badge badge-primary mb-1" target="_blank">Lihat detail</a>
                <a href="#" class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#tambah" onclick="tambah({{ $i->id }})">Beri bantuan</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--end::Block-->
    </div>
    <!--end::Section-->
  </div>
  <!--end::Card Body-->
</div>

<div class="card mb-2">
  <!--begin::Card Body-->
  <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
    <!--begin::Section-->
    <div>
      <!--begin::Heading-->
      <div class="col-12 d-flex">
        <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Bantuan anda</h1>
      </div>
      <!--end::Heading-->
      <!--begin::Block-->
      <div class="my-5 table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
              <th>No.</th>
              <th style="min-width: 320px">Nama pemberi bantuan</th>
              <th style="min-width: 150px">Foto</th>
              <th style="min-width: 150px">Deskripsi</th>
              <th style="min-width: 150px">Poin</th>
              <th style="min-width: 120px">Tanggal</th>
              <th style="min-width: 90px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($assistances as $a)
            @php
              $date = date_create($a->created_date);
            @endphp
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{ $a->provider }}</td>
              <td>
                <div class="symbol symbol-30px me-5" data-bs-toggle="modal" data-bs-target="#foto" onclick="foto('{{ $a->image }}','assistance')">
                  <img src="/assets/img/assistance/{{ $a->image }}" class="h-30 align-self-center of-cover rounded-0" alt="">
                </div>
              </td>
              <td>{{ $a->description }}</td>
              <td>
                <span class="badge badge-success">1</span>
              </td>
              <td>{{date_format($date,"d/m/Y H:i")}}</td>
              <td>
                <a href="#" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $a->id }})"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--end::Block-->
    </div>
    <!--end::Section-->
  </div>
  <!--end::Card Body-->
</div>

<div class="modal fade" tabindex="-1" id="tambah">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Beri bantuan dampak banjir</h3>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>

      <form class="form" method="post" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="impact_id">
        <div class="modal-body">
          <div class="row g-9">
            <div class="col-12">
              <label class="required fw-bold mb-2">Nama pemberi bantuan</label>
              <input type="text" class="form-control" name="provider" required>
            </div>
            <div class="col-12">
              <label class="required fw-bold mb-2">Upload foto bantuan</label>
              <input type="file" class="form-control" name="image" required>
            </div>
            <div class="col-12">
              <label class="required fw-bold mb-2">Deskripsi bantuan</label>
              <textarea class="form-control" name="description" rows="4" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="submit" value="store">Submit</button>
        </div>
      </form>  
      
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="hapus">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Hapus bantuan</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="">
          @csrf
          <div class="modal-body text-center">
            <input type="hidden" class="d-none" id="hi" name="id">
            <p class="fw-bold mb-2 fs-3">Bantuan dari "<span id="hd"></span>"</p>
            <p class="mb-2 fs-4">Apakah anda yakin ingin menghapus bantuan ini?</p>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger" name="submit" value="destroy">Hapus</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="foto">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="ft">View image</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
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
<script type="text/javascript">
  function foto(image,path){
    $("#img-view").attr("src","/assets/img/"+path+"/"+image);
  }
  function tambah(id){
    $('#tambah input[name="impact_id"]').val(id);
  }
  // function edit(id){
  //   $.ajax({
  //     url: "/api/impact/"+id,
  //     type: 'GET',
  //     dataType: 'json', // added data type
  //     success: function(response) {
  //       var mydata = response.data;
  //       $('#edit input[name="id"]').val(id);
  //       $('#edit input[name="name"]').val(mydata.name);
  //       $('#edit select[name="type"]').val(mydata.type);
  //       $('#edit input[name="address"]').val(mydata.address);
  //       $('#edit select[name="city_id"]').val(mydata.city_id);
  //       $('#edit textarea[name="description"]').val(mydata.description);
  //       $('#edit input[name="latitude"]').val(mydata.latitude);
  //       $('#edit input[name="longitude"]').val(mydata.longitude);
  //       $('#edit input[name="assistance_needed"]').val(mydata.assistance_needed);
  //       $("#et").text("Edit "+mydata.name);
  //       L.marker([mydata.latitude, mydata.longitude]).addTo(map2).bindPopup(`Latitude: ${mydata.latitude}<br>Longitude: ${mydata.longitude}`).openPopup();
  //       map2.panTo(new L.LatLng(mydata.latitude, mydata.longitude));
  //       map2.setZoom(mydata.city.zoom);
  //       map2.panTo(new L.LatLng(mydata.latitude, mydata.longitude));
  //     }
  //   });
  // }
  function hapus(id){
    $.ajax({
      url: "/api/assistance/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        //alert(JSON.stringify(mydata));
        var mydata = response.data;
        $("#hi").val(id);
        $("#hd").text(mydata.provider);
      }
    });
  }

</script>
@endsection