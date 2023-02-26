@extends('layouts.app')
@section('title','About us')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
    <link rel="stylesheet" href="/assets/css/slick.css?v={{env('APP_VER')}}">
    <style>
        @media(min-width:900px){
            .kindness-img{
                width:76%;
            }
        }
        @media (max-width: 499px){
            .heroes-text{
                zoom:60%
            }
            .img-text{
                zoom:50%
            }
            .zoom-mobile{
                zoom:68%
            }
            .left-img-text{
                zoom:55%;
                margin-top:52%
            }
            .homepage-banner {
                margin-top: 0px !important;
            }
            .quiz-header .quiz-header-content{
              zoom:50%
            }
        }
        @media (min-width: 500px){
            .left-img-text{
                zoom:110% !important;
                margin-top:74%
            }
        }
        .left-img-text{
            margin-left: -2rem;
            margin-right: -2rem;
        }
        #new-arrival img{
           max-height: 280px;
           width: auto !important;
           margin: auto;
        }
        .quiz-header img{
            width:100%;
        }
	    .zoomimage {
	    	zoom : 80%;
	    }
    </style>
@endsection


@section('content')
@include('layouts.transparent-navbar')
<!-- <section class="image-section">
    <img src="/assets/images/about/header.jpg?v={{env('APP_VER')}}" alt="">
</section> -->
<section class="image-section homepage-banner header-slider zoomimage">
	    <div>
			<img src="/assets/images/about/header_2.jpg?v={{env('APP_VER')}}" alt="">
		</div>
	    <div>
			<img src="/assets/images/about/header_1.jpg?v={{env('APP_VER')}}" alt="">
		</div>
	    <div>
			<img src="/assets/images/about/header.jpg?v={{env('APP_VER')}}" alt="">
		</div>

</section>

<section class="section" id="our-philosophy">
    <div class="container">
        <div class="columns is-variable is-8 is-multiline" style="align-items: center;">
            <div class="column is-6 is-12-touch">
                <h1 class="title">Our philosophy</h1>
                <p class="sub">
                    Our fundamental interest in things that smell good, are environmentally friendly, and can bring benefits to everyday life, led us to create a range of personal and home care products that we proudly call Botanical Essentials.
                </p>
                <p class="sub mt-4">
                    Our products are made from naturally derived  active ingredients that have gone through stringent research and quality control processes to ensure they are safe and beneficial  for your skin.
                </p>
            </div>
            <div class="column is-6 is-12-touch has-text-centered">
                <img class="lozad" data-src="/assets/images/about/about-1.jpg?v={{env('APP_VER')}}" alt="" style="width:120%">
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns is-variable is-8 reverse-columns is-multiline" style="align-items: center;">
            <div class="column is-6 is-12-touch has-text-centered">
                <img class="lozad kindness-img" data-src="/assets/images/about/about-2.jpg?v={{env('APP_VER')}}" alt="">
            </div>
            <div class="column is-6 is-12-touch">
                <h1 class="title">Kindness Everyday</h1>
                <p class="sub">
                    We are kind to the skin, kind to the world. We use plant-derived ingredients that are not only proven to benefit our skin, but also cultivated safely for a sustainable future. We choose high quality essential oils produced by farmers who practice sustainable farming methods as one of the ways to help their community. We are doing our part to be good to the planet by making all of our products recyclable, and at the same time, contributing to the circular economy.
                    <br><br>
                    You know what they say, small steps go a long way. Let’s inspire each other!

                </p>
            </div>
        </div>
    </div>
</section>

{{--<section>
    <img class="lozad" data-src="/assets/images/about/hand.jpg?v={{env('APP_VER')}}" alt="" style="width:100%">
</section>--}}

<section class="section" id="our-story">
    <div class="container">
        <h1 class="title has-text-centered">Our Story</h1>
        <p class="sub has-text-centered">
            We are a team of active, curious, and analytical creators who like to bring ideas to life. Our dream is to make this world a better place. So we’re challenging ourselves to create a personal care and home care line that is as kind to our environment as it is gentle on the skin. Something for our loved ones to use daily, made ethically from ingredients as natural as possible, with beautiful uplifting aromas.
            <br><br>
            Ta da! We created Botanical Essentials (BE)!
            <br><br>
            As a start, we chose to spotlight certain scents - Patchouli, Ylang, and Bergamot - essential oils that do the hard work but usually stay in the background and are seldom mentioned. They are actually a part of many fragrances and enhance others - unsung heroes who play supporting roles with little mention and less glory. We made them the heroes!
            <br><br>
            We believe that feeling good and doing good should go together. We hope BE can do its part to celebrate the little things in life that truly matter, to appreciate the people behind the scenes that make us stronger, and to spread our love. Let’s build a better future together by nurturing and cherishing, showing acceptance and openness, finding creative outlets, and sharing happiness in our daily life.. all while promoting a circular economy. We hope you enjoy a bit of me-time and indulge in some self pampering with BE!
            <br><br>
            Let’s celebrate our new heroes!
        </p>
    </div>

</section>

<section class="section bg-section mb-10">
    <div class="container has-text-centered">
        <h1 class="title">Contact us</h1>
        <p class="sub">
            General inquiries: hello@thebotanicalessentials.com
        </p>
        <p class="sub mt-5 mb-5">
            Media & partnerships: media@thebotanicalessentials.com
        </p>
        <div class="mt-5">
            @if(env('IG_URL'))
                <a href="{{env('IG_URL')}}" target="_blank">
                    <img data-src="/assets/images/ig-black.png?v={{env('APP_VER')}}" class="lozad mr-5 social-icon" alt="">
                </a>
            @endif
            @if(env('FB_URL'))
                <a href="{{env('FB_URL')}}" target="_blank">
                    <img data-src="/assets/images/fb-black.png?v={{env('APP_VER')}}" class="lozad ml-5 mr-5 social-icon" alt="">
                </a>
            @endif
            @if(env('WA_URL'))
                <a href="{{env('WA_URL')}}" target="_blank">
                    <img data-src="/assets/images/wa-black.png?v={{env('APP_VER')}}" class="lozad ml-5 social-icon" alt="">
                </a>
            @endif
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js?v={{env('APP_VER')}}"></script>
    <script type="text/javascript" src="/assets/js/slick.js?v={{env('APP_VER')}}"></script>
    <script>
        $(document).ready(function(){

            $('.header-slider').slick({
                autoplay: true,
                autoplaySpeed: 3500,
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37" style="left:3%"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 1,
            })
        });
    </script>
@endsection
