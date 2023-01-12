@extends('front.layouts.app')
@section('title','Shop by category')
@section('descrtipion',env("DEFAULT_DESC"))
@section('content')
@include('front.layouts.transparent-navbar')
	<section class="image-section">
		<img src="/assets/images/shop/header.jpg?v={{env('APP_VER')}}" alt="">
	</section>

	@include('front.shop.component.filter',['title' => str_replace('-',' ',$category)])

	<section class="section" id="shop">
		<div class="container has-text-centered pb-5">
			<div class="pt-5 columns is-multiline is-mobile is-variable is-5">
			    @foreach($products as $product)
				<a href="{{ route('shop.show',$product->slug) }}" class="column is-4-desktop is-4-tablet is-6-mobile {{$product->hero}}">
					<figure class="image">
						<img class="lozad" data-src="{{$product->image}}?v={{env('APP_VER')}}" alt="">
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
