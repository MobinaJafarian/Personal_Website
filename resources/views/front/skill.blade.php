<section class="skill py-5">
    <div class="skill-title text-center py-5">
         <h2 class="fw-bold">My Skills</h2>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum non tempore, vel voluptatum aliquam et quia ad sint cum explicabo labore saepe ab minus amet nam odio ea dolore sit.</p>

    <div class="container">
         <div class="row align-items-center">
              <div class="col-lg-6">
                   <div class="skill-text">
                        <h3 class="fs-4 fw-bold pb-3">{{ $about->title }}</h3>
                        <p class="text-muted">{{ $about->description }}</p>
                        <a href="{{ $about->link }}" class="btn btn-custom px-4">contact me</a>
                   </div>
              </div>
              <div class="col-lg-6">
                  @foreach ($skills as $item )
                         <div class="progress mt-3">
                        <div class="progress-bar" role="progressbar" style="width: {{ $item->precentage }};background-color: #7e57c2 !important;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100">{{ $item->precentage }} {{ $item->title }}</div>
                   </div>
                  @endforeach
              </div>
         </div>
    </div>
</section>
