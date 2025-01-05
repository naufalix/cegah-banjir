<!-- Activity Section -->
<section id="home-activity" class="section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Kegiatan</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>

  <div class="container px-md-5">

    <div class="row">
      
      @for ($i = 1; $i < 5; $i++)
      <div class="col-md-3">
        <div class="card position-relative" style="border-radius:20px;">
          <div class="card-body" style="border-radius:20px; padding: 20px">
            <img class="mb-3" src="https://cmsadmin.plnepi.co.id/storage/media/Screenshot%202024-07-11%20102019.png"
            style="border-radius:10px; width: 100%; aspect-ratio: 16/9; object-fit: cover;">
            <div class="">
              <h5 class="fw-bold" style="font-size: 18px">
                <a href="">Nama kegiatan</a>
              </h5>
              <p class="mb-0" style="font-size: 14px"><i class="bi bi-geo-alt-fill me-2"></i>Malang</p>
              <p class="mb-0" style="font-size: 14px"><i class="bi bi-calendar-event me-2"></i>3 September 2024</p>
            </div>
          </div>
        </div>
      </div>
      @endfor

    </div>
    <br>
    <div class="text-center">
      <button class="btn btn-primary">Selengkapnya</button>
    </div>    

  </div>

</section><!-- /About Section -->