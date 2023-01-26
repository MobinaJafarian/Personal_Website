<div class="home">
    <div class="container-fluid">
         <div class="row min-vh-100 align-items-center">
              <div class="col-lg-6">
                   <div class="home-text">
                        <h1 class="fw-bold pb-3">{{ $home->title }}</h1>
                        <h2 class="fw-bold">{{ $home->subject }}</h2>
                        <h4>{{ $home->job }}</h4>
                        <p class="text-muted">{{ \Illuminate\Support\Str::limit($home->description, 50) }}</p>
                        <a href="{{ $home->link }}" class="btn btn-custom px-5">about me</a>
                   </div>
              </div>
              <div class="col-lg-6 home-img min-vh-100">
                  <img src="{{ asset($home->image) }}" width="600" height="600" alt="">
              </div>
         </div>
    </div>
</div>
