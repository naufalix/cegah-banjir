<!-- Testimonial Section -->
<section id="testimonial" class="section bg-light">

  <div class="container section-title" data-aos="fade-up">
    <h2>Ulasan</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
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
                  'name' => 'John Doe',
                  'position' => 'Software Engineer',
                  'review' => 'This platform has been a game-changer for my career. Highly recommend it!',
              ],
              (object) [
                  'name' => 'Jane Smith',
                  'position' => 'Product Manager',
                  'review' => 'An excellent tool for team collaboration. Very intuitive and user-friendly.',
              ],
              (object) [
                  'name' => 'Michael Brown',
                  'position' => 'UX Designer',
                  'review' => 'The features are well thought out and have greatly improved my workflow.',
              ],
              (object) [
                  'name' => 'Emily Johnson',
                  'position' => 'Data Analyst',
                  'review' => 'The analytics tools provided have helped me uncover valuable insights. Amazing!',
              ],
              (object) [
                  'name' => 'David Lee',
                  'position' => 'Project Manager',
                  'review' => 'Managing my projects has never been this easy. A must-have tool for any team.',
              ],
            ];
          @endphp
          
          @foreach ($testimonials as $t)
          <div class="swiper-slide d-flex align-items-stretch">
            <div class="card p-3 border-0" style="border-radius: 20px">
          
              <div class="d-flex mb-2">
                <div class="me-3 my-auto">
                  <img src="/assets/img/team/team-1.jpg" class="my-auto rounded-circle" alt="" style="width: 50px">
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