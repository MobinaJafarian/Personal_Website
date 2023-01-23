<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/styles/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/styles/style.css') }}">
    <title>وب سایت شخصی جاناتان زاپاتا</title>
</head>

<body>

    @include('front.nav')


    <section class="blogs-detail py-5 mt-5">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-item ">
                        <img src="{{ asset($blog->image) }}" class="w-100" alt="">
                        <div class="blog-item-text p-2">
                            <h4 class="p-2 pb-4 fw-bold fs-5 border-bottom">{{ $blog->title }}</h4>
                            <p class="text-muted mt-5">{{ $blog->description }} </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('front.footer')


    <script src="js/bootstrap.js"></script>
</body>

</html>
