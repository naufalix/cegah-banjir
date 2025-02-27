@extends('layouts.index')

@section('content')
<section id="home-post" class="section bg-light">

  <div class="container section-title p-0" data-aos="fade-up">
    <h2>Laporan penyebab banjir</h2>
  </div>

  <div class="container px-md-5">
    <div class="card p-4">
      
      <div class="ms-auto">
        <a href="/dashboard/lapor-banjir">
          <button class="btn btn-success py-2 px-3" style="font-size: 12px;"><i class="bi bi-plus-lg"></i> Buat laporan</button>
        </a>
      </div>

      <div class="table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold text-center">
              <th class="d-none">No.</th>
              <th style="min-width: 90px">Waktu</th>
              <th style="min-width: 150px">Detail lokasi</th>
              <th style="min-width: 150px">Kota/Kabupaten</th>
              <th style="min-width: 200px">Penyebab banjir</th>
              <th style="min-width: 120px">Pelapor</th>
              <th style="min-width: 120px">Status</th>
              <th style="min-width: 120px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($floods as $f)
            @php
              $created = date_create($f->created_at);
            @endphp
            <tr class="text-center">
              <td class="d-none">{{$loop->iteration}}</td>
              <td>{{date_format($created,"d/m/Y")}}</td>
              <td><a href="/laporan/{{ $f->id }}">{{ $f->title }}</a></td>
              <td>{{ $f->city->name }}</a></td>
              <td>
                <span class="badge" style="background-color: {{ $f->cause->color }}">{{ $f->cause->name }}</span>
              </td>
              <td><a href="/kolaborator/{{ $f->user->username }}">{{ $f->user->name }}</a></td>
              <td>{{ $f->status == 1 ? 'Sudah ditindak' : 'Belum ditindak' }}</td>
              <td>
                <a class="btn py-1 px-3 {{ $f->status == 0 ? 'btn-warning' : 'btn-secondary disabled'}}" href="/dashboard/tindak-lanjut" style="font-size: 12px">Tindak</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <br><br>

  <div class="container section-title p-0" data-aos="fade-up">
    <h2>Laporan daerah rawan banjir</h2>
  </div>

  <div class="container px-md-5">
    <div class="card p-4">
      
      <div class="ms-auto">
        <a href="/dashboard/lapor-rawan">
          <button class="btn btn-success py-2 px-3" style="font-size: 12px;"><i class="bi bi-plus-lg"></i> Buat laporan</button>
        </a>
      </div>

      <div class="table-responsive">
        <table id="myTable2" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold text-center">
              <th class="d-none">No.</th>
              <th style="min-width: 150px">Tanggal banjir</th>
              <th style="min-width: 150px">Detail lokasi</th>
              <th style="min-width: 150px">Kota/Kabupaten</th>
              <th style="min-width: 150px">Deskripsi</th>
              <th style="min-width: 170px">Luas area banjir (m²)</th>
              <th style="min-width: 120px">Pelapor</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($risks as $r)
            @php
              $date = date_create($r->date);
            @endphp
            <tr class="text-center">
              <td class="d-none">{{$loop->iteration}}</td>
              <td>{{date_format($date,"d F Y")}}</td>
              <td><a href="/daerah-rawan/{{ $r->id }}">{{ $r->title }}</a></td>
              <td>{{ $r->city->name }}</td>
              <td>
                {{ strlen($r->description) > 40 ? substr($r->description, 0, 40) . '...' : $r->description }}  
              </td>
              <td>
                <span class="badge bg-primary">{{ $r->area }}m²</span>
              </td>
              <td><a href="/kolaborator/{{ $r->user->username }}">{{ $r->user->name }}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</section>
@endsection

@section('script')
<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
      "pageLength": 25,
      "language": {
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      },
    });
  });
  $(document).ready(function () {
    $('#myTable2').DataTable({
      "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
      "pageLength": 25,
      "language": {
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      },
    });
  });
</script>
@endsection