<!-- Testimonial Section -->
<section id="testimonial" class="section bg-light">

  <div class="container section-title" data-aos="fade-up">
    <h2>Ulasan</h2>
    <p>Berikan dan lihat pendapat pengguna tentang {{ $meta['app_name'] }}</p>
  </div>

  <div class="container px-md-4">
    
    <div class="d-flex">
      
      <div class="my-auto">
        <button type="button" class="btn btn-light btn-floating p-1 border testimonial-prev" style="position: relative">
          <i class="bi bi-chevron-left"></i>
        </button>
      </div>
      
      <div class="swiper mySwiper3">
        <div class="swiper-wrapper">

          @php
            $testimonials = [
              (object) [
                  'name' => 'Haniefa',
                  'position' => 'Individu',
                  'review' => 'Saya merasa lebih sadar lingkungan setelah menggunakan platform ini. Sekarang saya rutin melaporkan saluran air tersumbat di sekitar rumah',
              ],
              (object) [
                  'name' => 'Afianada',
                  'position' => 'Individu',
                  'review' => 'Fitur edukasinya sangat membantu saya memahami pentingnya menanam pohon untuk mencegah banjir. Saya sudah mulai menanam di halaman rumah',
              ],
              (object) [
                  'name' => 'Green Forest',
                  'position' => 'Komunitas',
                  'review' => 'Platform ini memudahkan kami dalam mengorganisasi kegiatan bersih-bersih drainase. Warga jadi lebih antusias ikut serta.',
              ],
              (object) [
                  'name' => 'BPBD Semarang',
                  'position' => 'Pemerintah',
                  'review' => 'Dengan peta rawan banjir, kami dapat memprioritaskan area yang membutuhkan perhatian khusus. Ini sangat membantu aksi komunitas kami',
              ],
              (object) [
                  'name' => 'BPBD Malang',
                  'position' => 'Pemerintah',
                  'review' => 'Kami sangat terbantu dengan laporan masyarakat melalui platform ini. Data yang terkumpul menjadi dasar penting untuk perbaikan drainase kota',
              ],
            ];
          @endphp
          
          @foreach ($testimonials as $t)
          <div class="swiper-slide d-flex align-items-stretch">
            <div class="card p-3 border-0" style="border-radius: 20px">
          
              <div class="d-flex mb-2">
                <div class="me-3 my-auto">
                  <img src="/assets/img/user/default.webp" class="my-auto rounded-circle" alt="" style="width: 50px">
                </div>
                <div class="text-start my-auto"> 
                  <h6 class="mb-0 fw-bold">{{ $t->name }}</h6>
                  <p class="mb-0" style="font-size: 12px">{{ $t->position }}</p>
                </div>
              </div>
              <p style="font-size: 14px">
                {{ $t->review }}
              </p>
            </div>

          </div>
          @endforeach
        </div>
      </div>

      <div class="my-auto">
        <button type="button" class="btn btn-light btn-floating p-1 border testimonial-next" style="position: relative">
          <i class="bi bi-chevron-right"></i>
        </button>
      </div>

    </div>   

  </div>

</section><!-- /About Section -->