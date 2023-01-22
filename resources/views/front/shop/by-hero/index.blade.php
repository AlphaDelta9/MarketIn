@extends('front.layouts.app')
@section('title','Shop by hero')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
    <link rel="stylesheet" href="/assets/css/slick.css">
@endsection
@section('content')
@include('front.layouts.transparent-navbar')
	<section class="image-section">
		<img src="/assets/images/shop/header.jpg" alt="">
	</section>

	@include('front.shop.component.filter',['title' => 'by hero'])

    <section class="section">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Bergamot</h1>
                    <p class="sub-3 mb-5">
                        Good to enhance your mood, alleviate stress and depression. Perfect for your lively, dynamic, and full of energy personality.
                    </p>
                    <a href="{{ route('shop.by-hero.hero', 'bergamot') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($bergamot as $data)
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
                    <h1 class="title has-text-weight-bold">Patchouli</h1>
                    <p class="sub-3 mb-5">
                        Known for its soothing and balancing aromatherapy properties. Ideal products for your confident, sophisticated, and charismatic self.
                    </p>
                    <a href="{{ route('shop.by-hero.hero', 'patchouli') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($patchouli as $data)
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

    <section class="section">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Ylang</h1>
                    <p class="sub-3 mb-5">
                        Good for improving memory and thinking. Perfect companion for your alluring and radiant nature.
                    </p>
                    <a href="{{ route('shop.by-hero.hero', 'ylang') }}" class="button-outline">SEE ALL</a>
                </div>
                <div class="column is-offset-1-desktop is-8-desktop is-12-mobile is-8-tablet">
                    <div class="shop-slider">
                        @foreach($ylang as $data)
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