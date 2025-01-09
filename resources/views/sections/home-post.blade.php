<!-- About Section -->
<section id="home-collab" class="section bg-light">

  <div class="container section-title" data-aos="fade-up">
    <h2>Edukasi</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
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
              <p style="font-size: 14px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, voluptas est quia...</p>
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
    <br>
    <div class="text-center">
      <a href="/artikel" class="btn btn-success">Lihat semua artikel</a>
    </div>    

  </div>

</section><!-- /About Section -->