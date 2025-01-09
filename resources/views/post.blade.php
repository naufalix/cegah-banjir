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
        <p>{{$post->body}}</p>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
          <h3>Project information</h3>
          <ul>
            <li><strong>Category</strong>: Web design</li>
            <li><strong>Project date</strong>: 01 March, 2020</li>
            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
          </ul>
        </div>
        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
          <h2>Exercitationem repudiandae officiis neque suscipit</h2>
          <p>
            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
          </p>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->
@endsection
