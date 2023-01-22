@extends('front.layouts.app')
@section('title', $product->name )
@section('description', $product->short_desc )
@section('image', $product->image )
@section('image_width',getimagesize(substr($product->image, 1))[0])
@section('image_height',getimagesize(substr($product->image, 1))[1])
@section('updated_at',date('c',strtotime($product->updated_at)))
@section('reading_time',round(str_word_count($product->short_desc)/150).' minutes')
@section('stylesheets')
<link rel="stylesheet" href="/assets/css/slick.css?v={{env('APP_VER')}}">
<style>
    .description, .ingredient, .how-to-use, #thoughtfully-chosen-actives, #ingredients, #how-to-use{
        white-space: pre-line;
    }
    .how-to-use+ul{
        list-style: disc;
        margin-left:2rem;
    }
    
    .tabcontent {
        display: none;
        animation: fadeEffect 1s; /* Fading effect takes 1 second */
    }
    /* Go from zero to full opacity */
    @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
    }
    .shop-tab ul{
        border:unset;
    }
    .shop-tab li{
        font-family: "Nova";
        display:inline-block;
    }
    .shop-tab li:after{
        content: ' | ';
        font-size: calc(1em + 1vw);
    }
    .shop-tab li:last-child:after{
        content: '';
    }
    .shop-tab ul a{
        padding: 0.5em 0;
        border:unset;
    }
    .shop-tab ul a .sub-2{
        color:rgb(102,102,102) !important;
    }
    .tablinks.active .sub-2{
        color:black !important;
    }
    .tabcontent{
        font-family: "Nova";
    }
    .tablinks.active span {
        font-weight: bolder;
    }
    @media (max-width: 499px){
        .sub-3.description,
        .sub-3.tabcontent{
            zoom:70%
        } 
        .sub-3{
            font-size:calc(1em + 1vw);
        }
    }
</style>
@endsection
@section('content')
@include('front.layouts.navbar')
	<section class="section">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-5-desktop is-6-tablet is-12-mobile">
                    <div>
                        <div class="product-slider">
                            <img src="{{$product->image}}?v={{env('APP_VER')}}" alt="" style="width:100%">
                            @if($product->image_back)
                            <img class="lozad" data-src="{{$product->image_back}}?v={{env('APP_VER')}}" alt="" style="width:100%">
                            @endif
                        </div>
                        <img class="mt-5" src="/assets/images/shop-detail/our-promise.png?v={{env('APP_VER')}}" alt="" style="width:100%">
                    </div>
                </div>
                <div class="column is-offset-1-desktop is-6-desktop is-6-tablet is-12-mobile">
                    <p class="sub-3 mb-5">By hero <span class="dots">&#8226;</span> {{ucfirst($product->hero)}}</p>
                    <h1 class="title has-text-weight-bold">{{$product->name}}</h1>
                    <p class="sub-3 description">{!!$product->description!!}</p>
                    
                    <p class="sub description mt-5" style="font-family: 'Nova';"><span class="has-text-weight-bold">Rp {{number_format($product->price,0,',','.')}} @if($product->size)| </span> {{$product->size}} mL / {{number_format($product->size*0.0338,1,'.','.')}} fl.oz. @endif</p>
                    
                    <div class="shop-tab mt-5">
                        <ul>
                            @if($product->chosen_active)
                                <li>
                                    <a onclick="openTab(event, 'thoughtfully-chosen-actives')" class="tablinks @if($product->chosen_active) active @endif">
                                        <span class="sub">Thoughtfully chosen Actives</span>
                                    </a>
                                </li>
                            @endif
                            @if($product->ingredient)
                                <li>
                                    <a onclick="openTab(event, 'ingredients')" class="tablinks @if($product->ingredient && $product->chosen_active == '') active @endif">
                                        <span class="sub">Ingredients</span>
                                    </a>
                                </li>
                            @endif
                            @if($product->how_to_use)
                                <li>
                                    <a onclick="openTab(event, 'how-to-use')" class="tablinks @if($product->how_to_use && $product->chosen_active == '' && $product->ingredient == '') active @endif">
                                        <span class="sub">How to use</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <!--/tabs is-centered-->
                    </div>
                    <div class="mt-2">
                        @if($product->chosen_active)
                            <div class="sub-3 tabcontent" id="thoughtfully-chosen-actives" @if($product->chosen_active)style="display:block"@endif>{!!$product->chosen_active!!}</div>
                        @endif
                        @if($product->ingredient)
                            <div class="sub-3 tabcontent" id="ingredients" @if($product->ingredient && $product->chosen_active == '') style="display:block" @endif>{!!$product->ingredient!!}</div>
                        @endif
                        @if($product->how_to_use)
                            <div class="sub-3 tabcontent" id="how-to-use" @if($product->how_to_use && $product->chosen_active == '' && $product->ingredient == '') style="display:block" @endif>{!!$product->how_to_use!!}</div>
                        @endif
                    </div>
                    
                    <h2 class="sub is-nova has-text-weight-bold mt-5 mb-5">
                        Where to buy
                    </h2>
                    <!--<div class="marketplace-container is-flex is-align-items-center">-->
                    <div class="marketplace-container is-align-items-center">
                        @if($product->lazada_link)
                        <a href="{{$product->lazada_link}}" class="mt-5 mr-2">
                            <img src="/assets/images/shop/lazada.png?v={{env('APP_VER')}}" alt="" style="max-width:15%">
                        </a>
                        @endif
                        @if($product->blibli_link)
                        <a href="{{$product->blibli_link}}" class="mt-5 mr-2">
                            <img src="/assets/images/shop/blibli.png?v={{env('APP_VER')}}" alt="" style="max-width:15%">
                        </a>
                        @endif
                        @if($product->tokopedia_link)
                        <a href="{{$product->tokopedia_link}}" class="mt-5 mr-2">
                            <img src="/assets/images/shop/tokopedia.png?v={{env('APP_VER')}}" alt="" style="max-width:15%">
                        </a>
                        @endif
                        @if($product->shopee_link)
                        <a href="{{$product->shopee_link}}" class="mt-5 mr-2">
                            <img src="/assets/images/shop/shopee.png?v={{env('APP_VER')}}" alt="" style="max-width:15%">
                        </a>
                        @endif
                        @if($product->sephora_link)
                        <a href="{{$product->sephora_link}}" class="mt-5 mr-2">
                            <img src="/assets/images/shop/sephora.png?v={{env('APP_VER')}}" alt="" style="max-width:15%">
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
	</section>

    <section class="section bg-section">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-3-desktop is-4-tablet is-12-mobile">
                    <h1 class="title has-text-weight-bold">Meet the match</h1>
                    <p class="sub-3 mb-5">
                        Okay, we got some of your favorites. For a more wholesome sensory experience, It’s time to take it up a notch by pairing up your choices with these other products that we think you might love.
                    </p>
                    <a href="" class="button-outline">SEE ALL</a>
                </div>
                @foreach($match as $data)
				<a href="{{ route('shop.show',$data->slug) }}" class="column @if($loop->first) is-offset-1-desktop @endif is-4-desktop is-4-tablet is-6-mobile {{$data->hero}}">
					<figure class="image">
						<img class="lozad" data-src="{{$data->image}}?v={{env('APP_VER')}}" alt="">
					</figure>
					<div class="sub-2 has-text-centered pt-5">{{$data->name}}
						<span>
							{{$product->short_desc}}
						</span>
                        <span>
                            @if($data->size !== 0){{$data->size}} mL / @endif Rp{{number_format($data->price,0,',','.')}}
                        </span>
					</div>
				</a>
				@endforeach
            </div>
        </div>
    </section>
    @include('front.shop.component.related-product')
@endsection
@section('scripts')

    <script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js?v={{env('APP_VER')}}"></script>
    <script type="text/javascript" src="/assets/js/slick.js?v={{env('APP_VER')}}"></script>
<script>
    function openTab(evt, tabTitle) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active","");
        }
        document.getElementById(tabTitle).style.display = "block";
        evt.currentTarget.className += " active";
    }
    
    
        $(document).ready(function(){
            $('.product-slider').slick({
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 1
            });
        });
    
</script>
@endsection