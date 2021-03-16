@php
    $sliders = DB::table('sliders')->get(); //**1** підключив табличку sliders
    //нижче реалізуєм foreach
@endphp

<!-- Banner -->
<section class="banner" id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">   {{--<div class="banner_background" style="background-image:url({{ asset('frontend/images/banner_background.jpg')}} "></div>--}}

        <div class="carousel-inner" role="listbox">{{--<div class="container fill_height">--}}

        @foreach($sliders as $key => $slider)      {{--$sliders берется зверху **1**--}}
        <!-- Slide 1 -->
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style=" background-image: url( {{ asset( $slider->image ) }} );"> {{--забрали active вставили $key == 0 ? 'active' : ''  --}}{{--<div class="row fill_height">--}}
            {{--<div class="banner_product_image"><img src="{{ asset('frontend/images/banner_product.png') }}" alt=""></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">new era of smartphones</h1>
                    <div class="banner_price"><span>$530</span>$460</div>
                    <div class="banner_product_name">Apple Iphone 6s</div>
                    <div class="button banner_button"><a href="#">Shop Now</a></div>
                </div>
            </div>--}}
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2> {{ $slider->title }} </h2>  {{-- Title --}}
                        <p> {{ $slider->description }} </p>
                        <div class="text-center"><a href="" class="btn-get-started">Прочитати більше</a></div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Banner -->





{{--<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner" role="listbox">

        @foreach($sliders as $key => $slider)      --}}{{--$sliders берется зверху **1**--}}{{--
        <!-- Slide 1 -->
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style=" background-image: url( {{ asset( $slider->image ) }} );"> --}}{{--забрали active вставили $key == 0 ? 'active' : ''  --}}{{--
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2> {{ $slider->title }} </h2>  --}}{{-- Title --}}{{--
                        <p> {{ $slider->description }} </p>
                        <div class="text-center"><a href="" class="btn-get-started">Прочитати більше</a></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->--}}
