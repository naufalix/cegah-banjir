@extends('layouts.index')

@section('content')
<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

  <div class="container px-md-5" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8">
        <h3 class="fw-bold mb-4">{{$post->title}}</h3>
        <img class="mb-4 img-fluid services-img border rounded" src="/assets/img/post/{{$post->image}}" alt=""
        style="width:100%; aspect-ratio: 16/9; object-fit: cover">
        @php
          $created = date_create($post->created_at);
        @endphp
        <div class="d-flex mb-3">
          <a class="mb-0 me-auto" href="/kolaborator/{{$post->user->username}}" style="font-size: 14px">
            <i class="bi bi-person-fill me-2"></i>{{$post->user->name}}
          </a>
          <p class="mb-0" style="font-size: 14px"><i class="bi bi-calendar-event me-2"></i>{{date_format($created,"d F Y")}}</p>
        </div>
        <p>{{$post->body}}</p>
        <br>
        
        <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-exclamation-triangle-fill"></i> Laporkan</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4">
        <h3 class="fw-bold mt-4 mb-3" style="font-size: 20px;">Artikel lainnya</h3>
        @foreach ($posts as $p)
        <a href="/artikel/{{$p->slug}}" data-aos="fade-up" data-aos-delay="200" >
          <div class="card mb-3" style="border-radius:20px; padding: 20px">
            <p class="mb-0">{{$p->title}}</p>
          </div>
        </a>
        @endforeach
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->
@endsection
