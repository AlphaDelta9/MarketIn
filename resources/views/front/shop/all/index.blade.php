@extends('front.layouts.app')
@section('title','All Product')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
<link rel="stylesheet" href="/assets/css/slick.css">
<style>
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
@include('front.layouts.transparent-navbar')
	<!-- <section class="image-section">
		<img src="/assets/images/shop/header.jpg" alt="">
	</section> -->

	<section class="image-section homepage-banner header-slider zoomimage">
	    <div>
			<img src="/assets/images/shop/header_3.jpg?v={{env('APP_VER')}}" alt="">
		</div> 
	    <div>
			<img src="/assets/images/shop/header_2.jpg?v={{env('APP_VER')}}" alt="">
		</div>
	       
	    <div>
			<img src="/assets/images/shop/header_1.jpg?v={{env('APP_VER')}}" alt="">
		</div>
	       
	    <div>
			<img src="/assets/images/shop/header.jpg?v={{env('APP_VER')}}" alt="">
		</div>
	       
	</section>

	@include('front.shop.component.filter',['title' => 'all products'])

	<section class="section" id="shop">
		<div class="container has-text-centered pb-5">
			<div class="pt-5 columns is-multiline is-mobile is-variable is-5">
			    @foreach($products as $product)
				<a href="{{ route('shop.show',$product->slug) }}" class="column is-4-desktop is-4-tablet is-6-mobile {{$product->hero}}">
					<figure class="image">
						<img class="lozad" data-src="{{$product->image}}?v={{env('APP_VER')}}" alt="{{$product->name}}">
					</figure>
					<div class="sub-2 has-text-centered pt-5 product-title">
					    {{$product->name}}
					</div>
					<div class="sub-2">
						<span>
							{{$product->short_desc}}
						</span>
                        <span>
                            @if($product->size !== 0){{$product->size}} mL / @endif Rp{{number_format($product->price,0,',','.')}}
                        </span>
					</div>
				</a>
				@endforeach
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
