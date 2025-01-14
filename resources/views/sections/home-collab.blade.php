<!-- About Section -->
<section id="home-collab" class="section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Leaderboard Kolaborator</h2>
    <p>Lihat Peringkat Kolaborator Teratas yang Aktif Berkontribusi dalam Mitigasi Banjir</p>
  </div>

  <div class="container">

    <div class="row text-center">

      @foreach ($users as $u)
      <div class="col-md-3">
        <a href="/kolaborator/{{$u->username}}">
          <div class="card" style="padding: 20px; border-radius: 20px">
            
            <div class="row">
              <div class="col-3">
                <img class="rounded-circle" src="/assets/img/user/{{ $u->image ? $u->image : 'default.webp' }}" alt="" style="width: 100%">
              </div>
              <div class="col-9 text-start d-flex">
                <div class="my-auto">
                  <p class="mb-0 fw-bold">{{ $u->name }}</p>
                  <p class="mb-0">{{ $u->location }}</p>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-8 me-auto text-start d-flex fs-4">
                <p class="text-success my-auto">{{ $u->point }} points</p>
              </div>
              <div class="col-4">
                <img src="/assets/img/rank{{ $loop->iteration}}.png" alt="" style="width: 30px">
              </div>
            </div>

          </div>
        </a>
      </div>
      @endforeach
      
      {{-- @for ($i = 1; $i < 4; $i++)
      <div class="col-md-4">
        <div class="card position-relative rounded-5">
          <div class="card-body p-4 text-white rounded-5" style="background-color: #30604C; padding-bottom: 50px !important">
            <div class="rounded-4 mb-3" style="height: 250px; background-color: #D9D9D9"></div>
            <div class="my-5" style="color: #C1E0F7">
              <p class="mb-1">Nama</p>
              <p class="mb-0">
                <i class="bi bi-geo-alt"></i> Lokasi
              </p>
            </div>
          </div>
        </div>
        <div
          class="h1 mx-auto rounded-circle"
          style="width: 100px;
          height: 100px;
          line-height: 100px;
          background-color: #619DB5;
          color: #30604C;
          font-weight: 600;
          font-size: 72px;
          margin-top: -50px;
          z-index: 1000;
          position: relative;"
        >
          {{$i}}
        </div>
      </div>
      @endfor --}}

    </div>
    <br>
    <div class="text-center">
      <button class="btn btn-primary">Beri Kontribusi</button>
    </div>    

  </div>

</section><!-- /About Section -->