<!-- About Section -->
<section id="home-collab" class="section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Leaderboard Kolaborator</h2>
    <p>Lihat Peringkat Kolaborator Teratas yang Aktif Berkontribusi dalam Mitigasi Banjir</p>
  </div>

  <div class="container">

    <div class="row text-center justify-content-center">

      @foreach ($users as $u)
      <div class="col-md-3 mb-4">
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

    </div>
    <br>
    <div class="text-center">
      <a class="btn btn-success" href="/kolaborator">Beri Kontribusi</a>
    </div>    

  </div>

</section><!-- /About Section -->