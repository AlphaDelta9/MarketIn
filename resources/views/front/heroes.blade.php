@extends('front.layouts.app')
@section('title','Heroes')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
    <style>
        @media (max-width: 499px){
            .heroes-text{
                zoom:60%
            }
        }
        @media(max-width:1023px){
            #header{
                padding-bottom:2.5rem;
                margin-bottom:0 !important;
            }
            .quiz-header .column.is-4 div{
                text-align:center;
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
        }
        @media (min-width:1024px){
            .section.is-relative{
                margin-top: 0 !important;
            }
            .heroes-header{
                margin-bottom:5.5rem;
            }
        }
        .quiz-header img{
            width:100%;
        }
    </style>
@endsection
@section('content')
@include('front.layouts.navbar')

    <section id="header" class=" pt-0 quiz-header mb-10" style="line-height:0 !important;background-color:#C5BEBE">
        <div style="background-color:#C5BEBE">
            <div class="columns is-variable is-8 is-multiline is-align-items-center reverse-columns">
                <div class="column is-4 is-12-touch is-offset-1-desktop">
                    <div>
                        <h1 class="title">
                            Find your favorite
                        </h1>
                        <p class="sub mb-5 pb-5">
                            <b>Take our personality quiz to know which hero is for you!</b>
                        </p>
                        
                        <a href="{{route('quiz')}}" class="button is-uppercase">Start here!</a>
                    </div>
                </div>
                <div id="heroes-header" class="column is-7 is-12-touch px-0 pb-0">
                    <img src="/assets/images/quiz/header-2.jpg?v={{env('APP_VER')}}" alt="">
                </div>
            </div>
        </div>
    </section>
	<section class="section heroes-header">
        <div class="container">
            <div class="columns is-multiline is-align-items-center">
                <div class="column is-12 is-12-touch pl-4 has-text-centered">
                    <h1 class="title has-text-centered-mobile">Meet our heroes</h1>
                    <p class="sub is-hidden-mobile">
                        It’s time to reveal all the charm behind our products.<br> We sought out these overlooked unsung heroes and brought them center stage.
                    </p>
                    <p class="sub is-hidden-tablet has-text-centered">
                        It’s time to reveal all the charm behind our products. We sought out these overlooked unsung heroes and brought them center stage.
                    </p>
                </div>
            </div>
        </div>
	</section>

    <section class="section is-relative pt-0">
        <div class="container">
            <img class="lozad is-hidden-tablet" data-src="/assets/images/heroes/bergamot.png?v={{env('APP_VER')}}" alt="" style="max-width:unset; margin-left:-24px; width:100vw">
            <div class="columns  is-multiline is-align-items-center">
                <div class="column is-7 is-12-touch pl-4">
                    <div class="has-text-centered-mobile">
					    <img class="lozad heroes-text" data-src="/assets/images/bergamot-text.png?v={{env('APP_VER')}}" alt="" style="margin:auto; width:337px !important">
                    </div>
                    <p class="sub has-text-centered-mobile pb-3">
                        Say hello to this energizer that adds sparkle to our products; Bergamot a.k.a. Citrus bergamia from South Italy. The essential oil - coming from its fruit peel - smells zesty, fresh, sparkling, vibrant, bitter, and spicy. It has been commonly used to enhance our mood and to alleviate stress and depression. A perfect match for your lively, dynamic, and full of energy personality.
                    </p>
                    <div class="mt-5 has-text-centered-mobile is-relative" style="z-index:2">
                        <a href="{{route('heroes.bergamot')}}" class="button is-uppercase">Learn More</a>
                    </div>
                </div>
                <div class="column is-5 is-12-touch is-hidden-mobile">
                    <img class="lozad" data-src="/assets/images/heroes/bergamot.png?v={{env('APP_VER')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="section is-relative">
        <div class="container">
            <img class="lozad is-hidden-tablet" data-src="/assets/images/heroes/patchouli.png?v={{env('APP_VER')}}" alt="" style="max-width:unset; margin-left:-24px; width:100vw">
            <div class="columns  is-multiline is-align-items-center reverse-columns">
                <div class="column is-5 is-12-touch is-hidden-mobile">
                    <img class="lozad" data-src="/assets/images/heroes/patchouli.png?v={{env('APP_VER')}}" alt="">
                </div>
                <div class="column is-7 is-12-touch pl-4">
                    <div class="has-text-centered-mobile">
    					<img class="lozad heroes-text" data-src="/assets/images/patchouli-text.png?v={{env('APP_VER')}}" alt="" style="margin:auto; width:356px !important">
                    </div>
                    <p class="sub has-text-centered-mobile pb-3">
                       Welcoming this hidden gem that is the pillar to our luxurious fragrance; Patchouli a.k.a. <em>Pogostemon cablin</em>, from a sustainable farm in Sulawesi, Indonesia. The essential oil - coming from its leaves - smells heavy, earthy, woody, minty, leathery, and mossy. Well known for its grounding & balancing aromatherapy properties. An ideal pair for your confident, sophisticated, and charismatic self. 
                    </p>
                    <div class="mt-5 has-text-centered-mobile is-relative" style="z-index:2">
                        <a href="{{route('heroes.patchouli')}}" class="button is-uppercase">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section is-relative">
        <div class="container">
            <img class="lozad is-hidden-tablet" data-src="/assets/images/heroes/ylang.png?v={{env('APP_VER')}}" alt="" style="max-width:unset; margin-left:-24px; width:100vw">
            <div class="columns  is-multiline is-align-items-center">
                <div class="column is-7 is-12-touch pl-4">
                    <div class="has-text-centered-mobile">
					    <img class="lozad heroes-text" data-src="/assets/images/ylang-text.png?v={{env('APP_VER')}}" alt="" style="margin:auto; width:255px !important">
                    </div>
                    <p class="sub has-text-centered-mobile">
                        Make way for this understated, elegant, exotic beauty; Ylang Ylang a.k.a. Cananga Odorata from Madagascar. The essential oil - coming from its flowers - smells sweet, rich, fruity floral, and warm. It is famous for its relaxing effect, good for improving memory and thinking, and is also celebrated as an effective insect repellent. An impeccable companion for your alluring and radiant presence.
                    </p>
                    <div class="mt-5 has-text-centered-mobile pb-3 is-relative" style="z-index:2">
                        <a href="{{route('heroes.ylang')}}" class="button is-uppercase">Learn More</a>
                    </div>
                </div>
                <div class="column is-5 is-12-touch is-hidden-mobile">
                    <img class="lozad" data-src="/assets/images/heroes/ylang.png?v={{env('APP_VER')}}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
