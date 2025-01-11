@extends('layouts.index')

@section('content')
<section id="home-post" class="section bg-light">

  <div class="container section-title p-0" data-aos="fade-up">
    <h2>Laporan penyebab banjir</h2>
  </div>

  <div class="container px-md-5">

    <div class="card p-4">
      <div class="table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold text-center">
              <th class="d-none">No.</th>
              <th style="min-width: 90px">Waktu</th>
              <th style="min-width: 150px">Detail lokasi</th>
              <th style="min-width: 300px">Penyebab banjir</th>
              <th style="min-width: 120px">Pelapor</th>
              <th style="min-width: 120px">Status</th>
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
              <td>
                <span class="badge" style="background-color: {{ $f->cause->color }}">{{ $f->cause->name }}</span>
              </td>
              <td><a href="/kolaborator/{{ $f->user->username }}">{{ $f->user->name }}</a></td>
              <td>{{ $f->status == 1 ? 'Sudah ditindak' : 'Belum ditindak' }}</td>
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
      }
    });
  });
</script>
@endsection