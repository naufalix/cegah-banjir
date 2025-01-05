<!-- About Section -->
<section id="home-collab" class="section bg-light">

  <div class="container section-title" data-aos="fade-up">
    <h2>Edukasi</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>

  <div class="container px-md-5">

    <div class="row">
      
      @for ($i = 1; $i < 4; $i++)
      <div class="col-md-4">
        <div class="card position-relative" style="border-radius:20px; border: 0px">
          <div class="card-body" style="border-radius:20px; padding: 20px">
            <img class="mb-3" src="https://dongkrakusaha.com/uploads/Cara20200401-062222-images%20(18).jpeg"
            style="border-radius:10px; width: 100%; aspect-ratio: 16/9; object-fit: cover;">
            <div class="">
              <h5 class="fw-bold" style="font-size: 18px">
                <a href="">Lorem ipsum dolor sit amet, ipsum consectetur adipisicing elit.</a>
              </h5>
              <p style="font-size: 14px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, voluptas est quia...</p>
              <div class="d-flex" style="font-size: 14px">
                <img class="rounded-circle" src="/assets/img/team/team-1.jpg" alt="" width="25" height="25">
                <p class="my-auto ms-2 fw-bold">Budiono Siregar</p>
                <p class="my-auto ms-auto">18 Agustus 2024</p>
              </div>
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