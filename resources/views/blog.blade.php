@extends('layouts.index')

@section('content')
<section id="home-post" class="section bg-light">

  <div class="container section-title pb-3" data-aos="fade-up">
    <h2>Artikel Edukasi</h2>
    <p>Pelajari penyebab banjir dan cara efektif mengatasinya.</p>
    <div class="text-center mt-4">
      <a class="btn btn-success" href="/dashboard/artikel">Buat artikel</a>
    </div> 
  </div>

  <div class="container px-md-5">

    <div class="row">
      
      @foreach ($posts as $p)
      @php
        $created = date_create($p->created_at);
      @endphp
      <div class="col-md-4">
        <div class="card position-relative" style="border-radius:20px; border: 0px">
          <div class="card-body" style="border-radius:20px; padding: 20px">
            <img class="mb-3" src="/assets/img/post/{{$p->image}}"
            style="border-radius:10px; width: 100%; aspect-ratio: 16/9; object-fit: cover;">
            <div class="">
              <h5 class="fw-bold" style="font-size: 18px">
                <a href="/artikel/{{$p->slug}}">{{$p->title}}</a>
              </h5>
              <p style="font-size: 14px">
                {{ strlen($p->body) > 100 ? substr($p->body, 0, 100) . '...' : $p->body }}
              </p>
              <div class="d-flex" style="font-size: 14px">
                <img class="rounded-circle" src="/assets/img/user/{{ $p->user->image ? $p->user->image : 'default.webp' }}" alt="" width="25" height="25">
                <p class="my-auto ms-2 fw-bold">{{$p->user->name}}</p>
                <p class="my-auto ms-auto">{{date_format($created,"d F Y")}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>  

  </div>

</section>
@endsection
