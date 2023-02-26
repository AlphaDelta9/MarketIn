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
@include('layouts.navbar')
@section('content')

	<section class="section" id="new-arrival">
		<div class="container">
            <form class="mb-4 space-y-5" action="{{url('search')}}" method="get">
                <div>
                    <label for="city" class="block mb-2 text-sm">Kota</label>
                    <input type="text" name="city" class="w-full px-3 py-2 border-b border-gray-400" id=""
                    list="city" value="{{old('city')}}">
                    <datalist id="city">
                        @foreach($cities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    </datalist>
                    @error('city')
                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="type" class="block mb-2 text-sm">Jenis</label>
                    <input type="text" name="type" class="w-full px-3 py-2 border-b border-gray-400" id=""
                    list="type" value="{{old('type')}}">
                    <datalist id="type">
                        @foreach($types as $type)
                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                        @endforeach
                    </datalist>
                    @error('type')
                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="search" class="block mb-2 text-sm">Nama</label>
                    <input type="search" name="search" class="w-full px-3 py-2 border-b border-gray-400" id=""
                    value="{{old('search')}}">
                    @error('search')
                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input class="block ml-auto btn btn-primary" type="submit" value="Search">
            </form>
            <div class="grid grid-cols-3 gap-5 mb-4">
                @foreach($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
            {{$projects->links()}}
		</div>
	</section>

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
