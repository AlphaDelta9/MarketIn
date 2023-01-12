@extends('front.layouts.app')
@section('title', $journal->name )
@section('description', $journal->summary )
@section('image', $journal->image )
@section('image_width',getimagesize(substr($journal->image, 1))[0])
@section('image_height',getimagesize(substr($journal->image, 1))[1])
@section('updated_at',date('c',strtotime($journal->updated_at)))
@section('reading_time',round(str_word_count($journal->content)/150).' minutes')
@section('stylesheets')
<style>
    p,li{
        font-size: calc(1em + 1vw) !important;
    }
    h2{
        font-size: calc(1em + 3vw);
        margin-bottom:1.5rem;
    }
    h3{
        font-size: calc(1em + 2.5vw);
    }
    ul{
        list-style:disc;
        margin-left:1.5rem;
    }
    ul+ol{
        margin-left:2.5rem;
    }
    ul+ul{
        margin-left:2.5rem;
    }
    li{
        margin-bottom:0 !important;
    }
    @media screen and (min-width: 1281px){
        ul,ol,h3,h2 {
            zoom: 80%;
        }
    }
    @media (max-width: 499px){
        img{
            max-width:100%;
        }
        ul,ol {
            zoom: 80%;
        }
    }
</style>
@endsection
@section('content')
@include('front.layouts.navbar')
<section class="image-section">
    <img src="{{$journal->image}}" alt="{{$journal->name}}">
</section>

<section class="section" id="shop">
    <div class="container pb-5">
        <h2>{{$journal->name}}</h2>
        {!! $journal->content !!}
    </div>
</section>
@endsection
