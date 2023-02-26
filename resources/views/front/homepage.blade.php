@extends('layouts.app')
@section('title','Homepage')
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
</style>
@endsection
@section('content')
@include('layouts.navbar')
@isset($active)

	<section class="section" id="about">
		{{--<div class="ornament-about is-hidden-mobile">
			<img src="/assets/images/homepage/ornament-1.png?v={{env('APP_VER')}}" alt="">
		</div>--}}
		<div class="is-hidden-tablet" style="position:absolute; width:100px; top:-14px;left:0;z-index:-1">
			<img src="/assets/images/homepage/ornament-9.png?v={{env('APP_VER')}}" alt="">
		</div>
		<div class="container">
            @if(!auth()->user()->role)
            <div class="mb-4 text-3xl">Proyek Sekarang</div>
            @endif
            <div class="grid grid-cols-{{$active->count()}} gap-5 justify-items-center">
                @forelse($active as $item)
                    <div class="flex space-x-3">
                        @if(auth()->user()->role)
                        <a href="{{ url('/create/'.$item->name) }}" class="w-40 px-3 py-3 text-center border border-gray-200 rounded-lg group">
                            <i class="{{ $item->icon }} text-primary/50 group-hover:text-primary transition" style="font-size: 60px;"></i>
                            <div class="mt-2 transition group-hover:text-primary">{{ $item->name }}</div>
                        </a>
                        @elseif(!$item->project_header->finished_at)
                        @include('layouts.project-card', ['project' => $item->project_header])
                        @endif
                    </div>
                @empty
                    <div class="flex-1 pr-2 font-bold" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap"> No projects</div>
                @endforelse
            </div>
		</div>
	</section>

	<section class="bg-section section homepage-heroes">
		<div class="container">
            @if(auth()->user()->role)
            <div class="mb-4 text-3xl">Proyek Sekarang</div>
            @else
            <div class="mb-4 text-3xl">Proyek Rekomendasi</div>
            @endif
            <div class="grid grid-cols-3 gap-5">
                @forelse($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @empty
                    <div class="flex-1 pr-2 font-bold" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap"> No projects</div>
                @endforelse
            </div>
            <div class="text-base">
                {{$projects->links()}}
            </div>
		</div>
	</section>

@endisset
@empty($active)

	<section class="section" id="new-arrival">
		<div class="container">
            <div class="mb-4 text-3xl">Proyek Rekomendasi</div>
            <div class="grid grid-cols-3 gap-5">
                @foreach($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
            {{$projects->links()}}
		</div>
	</section>
@endempty
@endsection
@section('scripts')
<script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js?v={{env('APP_VER')}}"></script>
    <script type="text/javascript" src="/assets/js/slick.js?v={{env('APP_VER')}}"></script>
    <script>
        $(document).ready(function(){
            $('.related-product').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37" style="left:3%"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 3,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            slidesToShow: 1
                        }
                    }
                ]
            })

            $('.blog').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37" style="left:3%"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 3,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.header-slider').slick({
                autoplay: true,
                autoplaySpeed: 4000,
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37" style="left:3%"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 1,
            })
        });
    </script>
@endsection
