@extends('layouts.index')

@section('content')
<section id="home-post" class="section bg-light">

  <div class="container section-title p-0" data-aos="fade-up">
    <h2>Kolaborator {{ $meta['app_name'] }}</h2>
  </div>

  <div class="container px-md-5">

    <div class="card p-4">
      <div class="table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold text-center">
              <th class="d-none">No.</th>
              <th style="min-width: 90px">Nama</th>
              <th style="min-width: 150px">Tipe</th>
              <th style="min-width: 300px">Lokasi</th>
              <th style="min-width: 120px">Poin</th>
              <th style="min-width: 120px">Profil</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $u)
            @php
              $type = strtolower($u->type);
            @endphp
            <tr class="text-center taxt-dark">
              <td class="d-none">{{$loop->iteration}}</td>
              <td>{{ $u->name }}</td>
              <td>
                <span class="badge 
                  @if($type == 'individu') bg-primary 
                  @elseif($type == 'komunitas') bg-warning 
                  @elseif($type == 'pemerintah') bg-danger 
                  @else bg-success 
                  @endif">
                  {{ $type }}
                </span>
              </td>
              <td>{{ $u->location }}</td>
              <td><span class="badge bg-success">{{ $u->point }}</span></td>
              <td><a class="badge bg-success" href="/kolaborator/{{ $u->username }}">Detail</a></td>
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