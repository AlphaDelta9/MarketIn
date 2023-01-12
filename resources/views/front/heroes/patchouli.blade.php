@extends('front.layouts.app')
@section('title','Patchouli')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
<style>
    @media (max-width:500px){
        .section{
            padding:0 !important;
        }
    }
</style>
@endsection
@section('content')
@include('front.layouts.navbar')

    <section class="section is-relative">
        <div class="container">
            <img class="lozad" data-src="/assets/images/heroes/patchouli/1.png?v={{env('APP_VER')}}" alt="" style="width:100%">
        </div>
    </section>
@endsection
