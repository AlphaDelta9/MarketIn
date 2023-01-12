@extends('front.layouts.app')
@section('title','Shop by category')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
    <link rel="stylesheet" href="/assets/css/slick.css">
@endsection
@section('content')
@include('front.layouts.transparent-navbar')
	<section class="image-section">
		<img src="/assets/images/shop/by-category.jpg" alt="">
	</section>

	@include('front.shop.component.filter',['title' => 'by category'])

    <section class="section">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Hair Care</h1>
                    <p class="sub-3 mb-5">
                    Our Stronger and Thicker hair care range is gently formulated for oily and sensitive scalps with normal to thin hair.
                    </p>
                    <a href="{{ route('shop.by-category.category', 'hair-care') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($hair_care as $data)
                        <a href="{{ route('shop.show',$data->slug) }}" class="column is-4-desktop is-4-tablet is-6-mobile {{$data->hero}}">
                            <figure class="image">
                                <img src="{{$data->image}}?v={{env('APP_VER')}}" alt="">
                            </figure>
        					<div class="sub-2 has-text-centered pt-5 product-title">
        					    {{$data->name}}
        					</div>
        					<div class="sub-2">
        						<span>
        							{{$data->short_desc}}
        						</span>
                                <span>
                                    @if($data->size !== 0){{$data->size}} mL / @endif Rp{{number_format($data->price,0,',','.')}}
                                </span>
        					</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="section bg-section">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Body Care</h1>
                    <p class="sub-3 mb-5">
                        Our specially formulated range is a natural and mild choice for all skin types, with the benefits you will love.
                    </p>
                    <a href="{{ route('shop.by-category.category', 'body-care') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($body_care as $data)
                        <a href="{{ route('shop.show',$data->slug) }}" class="column is-4-desktop is-4-tablet is-6-mobile {{$data->hero}}">
                            <figure class="image">
                                <img src="{{$data->image}}?v={{env('APP_VER')}}" alt="">
                            </figure>
        					<div class="sub-2 has-text-centered pt-5 product-title">
        					    {{$data->name}}
        					</div>
        					<div class="sub-2">
        						<span>
        							{{$data->short_desc}}
        						</span>
                                <span>
                                    @if($data->size !== 0){{$data->size}} mL / @endif Rp{{number_format($data->price,0,',','.')}}
                                </span>
        					</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section ">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Home and Hygiene care</h1>
                    <p class="sub-3 mb-5">
                        Gently formulated for use around your loved ones. We use responsibly sourced essential oils for a comfortable home ambiance.
                    </p>
                    <a href="{{ route('shop.by-category.category', 'home-and-hygiene-care') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($home_hygiene as $data)
                        <a href="{{ route('shop.show',$data->slug) }}" class="column is-4-desktop is-4-tablet is-6-mobile {{$data->hero}}">
                            <figure class="image">
                                <img src="{{$data->image}}?v={{env('APP_VER')}}" alt="">
                            </figure>
        					<div class="sub-2 has-text-centered pt-5 product-title">
        					    {{$data->name}}
        					</div>
        					<div class="sub-2">
        						<span>
        							{{$data->short_desc}}
        						</span>
                                <span>
                                    @if($data->size !== 0){{$data->size}} mL / @endif Rp{{number_format($data->price,0,',','.')}}
                                </span>
        					</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section bg-section">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Travel kits and Gift sets</h1>
                    <p class="sub-3 mb-5">
                        These sets include all the essential products you need on the go. Its compact design fits your travel bag and your active lifestyle.
                    </p>
                    <a href="{{ route('shop.by-category.category', 'travel-kits-and-Gift-sets') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($travel_kit as $data)
                        <a href="{{ route('shop.show',$data->slug) }}" class="column is-4-desktop is-4-tablet is-6-mobile {{$data->hero}}">
                            <figure class="image">
                                <img src="{{$data->image}}?v={{env('APP_VER')}}" alt="">
                            </figure>
        					<div class="sub-2 has-text-centered pt-5 product-title">
        					    {{$data->name}}
        					</div>
        					<div class="sub-2">
        						<span>
        							{{$data->short_desc}}
        						</span>
                                <span>
                                    @if($data->size !== 0){{$data->size}} mL / @endif Rp{{number_format($data->price,0,',','.')}}
                                </span>
        					</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/slick.js"></script>
    <script>
        $(document).ready(function(){
            $('.shop-slider').slick({
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 2,
                responsive: [
                    {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        slidesToShow: 2,
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 2
                    }
                    }
                ]
            });
        });
    </script>
@endsection