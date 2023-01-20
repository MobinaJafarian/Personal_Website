<section class="blogs py-5 mt-5">
    <div class="blog-title text-center py-5 mt-5">
         <h2 class="fw-bold">بلاگ های من</h2>
         <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
    </div>

    <div class="container">
         <div class="row">
            {{-- @foreach ($blog as  $item)
            <div class="col-lg-4">
                <div class="blog-item shadow">
                <img src="{{ asset('admin/images/blogs/'.$item->image) }}" class="w-100" alt="">
                <div class="blog-item-text p-2">
                     <h4 class="p-2 fw-bold fs-5 border-bottom">{{ $item->title }}</h4>
                     <p class="text-muted">{{ \Illuminate\Support\Str::limit($item->description, 100) }} </p>
                     <a href="{{ route('blog.detail', $item->id) }}" target="_blank" class="btn btn-danger w-100">بخوانید</a>
                </div>
                </div>
           </div>
            @endforeach --}}

         </div>
    </div>
</section>
