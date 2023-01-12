@push('stylesheets')
    <link rel="stylesheet" href="/assets/css/slick.css">
@endpush
<section class="section">
    <div class="container">
        <h1 class="subtitle has-text-centered">You may also like</h1>
        <div class="related-product">
            @foreach($related_products as $product)
            <a href="{{ route('shop.show',$product->slug) }}" class="{{$product->hero}}">
                <figure class="image">
                    <img src="{{$product->image}}" alt="">
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
@push('scripts')
    <script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/slick.js"></script>
    <script>
        $(document).ready(function(){
            $('.related-product').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                dots: false,
                arrows: true,
                prevArrow: '<svg class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 3,
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
@endpush