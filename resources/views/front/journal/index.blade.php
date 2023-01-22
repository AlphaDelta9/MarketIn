@extends('front.layouts.app')
@section('title','Journal')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
<style>
    @media screen and (min-width: 1281px){
        .sub{
            zoom:60%
        }   
    }
    .sub{
        zoom:60%
    }
</style>
@endsection
@section('content')
@include('front.layouts.navbar')
<section class="hero hero-text">
<!--<section class="hero hero-text" style="background-image:url({{ $headline->image }})">-->
    <div class="hero-body">
        <div class="columns header-text-right">
            <div class="column is-8-desktop is-hidden-touch"></div>
            <div class="column">
                <h1 class="subtitle">
                    {{$headline->name}}
                </h1>
                <p class="sub mb-5">
                    {{ substr($headline->summary,0,350)}}
                </p>
                <a href="{{ route('journal.show',$headline->slug) }}" class="button is-uppercase">Read More</a>
            </div>
        </div>
    </div>
</section>

    <section class="section">
        <div class="container">
            <div class="columns is-variable is-8 is-multiline">
                @foreach($journal as $i => $article) 
                    @if(($i+1)%3 == 0)
                        <div class="column is-12 mb-5">
                            <div class="columns is-variable is-8">
                                <div class="column is-7">
                                    <figure class="image is-3by2">
                                        <img class="lozad" data-src="{{ $article->image }}" style="object-fit: cover">
                                    </figure>
                                </div>
                                <div class="column">
                                    <h1 class="subtitle">{{ $article->name }}</h1>
                                    <p class="sub mt-5 mb-5 is-nova">
                                        {{ substr($article->summary,0,350)}}
                                    </p>
                                    <a href="{{ route('journal.show', $article->slug) }}" class="button-text">Read More</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="column is-6 mb-5">
                            <figure class="image is-3by2">
                                <img class="lozad" data-src="{{ $article->image }}" style="object-fit: cover">
                            </figure>
                            <h1 class="subtitle mt-5">{{ $article->name }}</h1>
                            <p class="sub mt-5 mb-5 is-nova">
                                {{ substr($article->summary,0,150)}}
                            </p>
                            <a href="{{ route('journal.show', $article->slug) }}" class="button-text">Read More</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
