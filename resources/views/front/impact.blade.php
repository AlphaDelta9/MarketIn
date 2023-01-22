@extends('front.layouts.app')
@section('title','Sustainability')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
<link rel="stylesheet" href="/assets/css/slick.css?v={{env('APP_VER')}}">
<style>
    h1.subtitle{
        zoom:100% !important;
        font-weight:bolder;
    }
    @media (min-width: 500px){
        p.is-nova, ul.is-nova{
            zoom: 70% !important
        }
    }
    html {
      scroll-behavior: smooth;
    }
    .btn-img{
        position: absolute;
        width: 25%;
        height: 25%;
    }
    #btn-ethically-sourced{
        top: 0;
        left: 38%;
    }
    #btn-made-with-essential-oil{
        bottom: 0;
        left: 38%;
    }
    #btn-no-cruelty{
        top:20%;
        right:0%;
    }
    #btn-dermatologically-tested{
        bottom:17%;
        left:0%;
    }
    #btn-plant-derived{
        bottom:17%;
        right:0%;
    }
    #btn-recyclable-packaging{
        top:20%;
        left:0%;
    }
    img{
        object-fit:contain;
    }
</style>
@endsection
@section('content')
@include('front.layouts.navbar')

	
    <section class="section">
        <div class="container">
            <div>
                <div class="gallery-slider">
                    <img src="/assets/images/impact/slider/1.jpg">
                    <img src="/assets/images/impact/slider/2.jpg">
                    <img src="/assets/images/impact/slider/3.jpg">
                    <img src="/assets/images/impact/slider/4.jpg">
                    <img src="/assets/images/impact/slider/5.jpg">
                    <img src="/assets/images/impact/slider/6.jpg">
                    <img src="/assets/images/impact/slider/7.jpg">
                    <img src="/assets/images/impact/slider/8.jpg">
                    <img src="/assets/images/impact/slider/9.jpg">
                    <img src="/assets/images/impact/slider/10.jpg">
                </div>
            </div>
        </div>
    </section>
    {{--<section>
        <figure class="image is-16by9">
            <iframe class="has-ratio" src="https://www.youtube.com/embed/YE7VzlLtp-4" frameborder="0" allowfullscreen></iframe>
          </figure>
    </section>--}}

	<section class="section bg-section">
		<div class="container">
			<h1 class="title has-text-centered">Our mother earth deserves better.</h1>
			<div class="columns mt-5 pt-5 is-variable is-8 is-align-items-center">
                <div class="column is-7">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/our-promise.png?v={{env('APP_VER')}}">
                        <a href="#ethically-sourced" class="btn-img" id="btn-ethically-sourced"></a>
                        <a href="#made-with-essential-oil" class="btn-img" id="btn-made-with-essential-oil"></a>
                        <a href="#no-cruelty" class="btn-img" id="btn-no-cruelty"></a>
                        <a href="#dermatologically-tested" class="btn-img" id="btn-dermatologically-tested"></a>
                        <a href="#plant-derived" class="btn-img" id="btn-plant-derived"></a>
                        <a href="#recyclable-packaging" class="btn-img" id="btn-recyclable-packaging"></a>
                    </figure>
                </div>
                <div class="column is-5">
                    <div class="columns is-multiline is-mobile" style="align-items: center;">
                        <div class="column is-12-tablet is-5-mobile">
        			        <h1 class="subtitle">Together, we can make it happen.</h1>
                        </div>
                        <div class="column is-12-tablet is-7-mobile">
                            <p class="sub is-nova">
                                We are committed to creating the best product without harming the environment. We believe that we should always be kind and give back to nature.
                            </p>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>

	<section class="section" id="ethically-sourced">
		<div class="container">
			<div class="columns is-variable is-8 is-align-items-center is-mobile">
                <div class="column is-3 is-offset-1">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/ethically.png?v={{env('APP_VER')}}">
                    </figure>
                </div>
                <div class="column is-7">
        			<h1 class="subtitle">Ethically sourced</h1>
                    <p class="sub mt-5 is-nova">
                        We commit to sourcing all our essential oils through ethical and sustainable methods, partnering with the most reputable suppliers across the globe, such as Givaudan and Firmenich. Their approach to sourcing responsibly is in alignment with the United Nations Sustainable Development Goals.
                        <br><br>
                        Their commitments for ethical and responsible sourcing are as follows:
                    </p>
        			<ul class="sub is-nova" style="list-style: disc; margin-left:1.2rem;">
        			    <li>
        			        Sourcing ingredients at origin for transparency and traceability
        			    </li>
        			    <li>
        			        Providing continuous improvement to secure supplies
        			    </li>
        			    <li>
        			        Supporting the local communities by developing projects for education, health and nutrition
        			    </li>
        			    <li>
        			        Good agriculture and production practices
        			    </li>
        			</ul>
                    <p class="sub mt-5 is-nova">
                        <b>#BEahero</b>
                    </p>
                </div>
			</div>
		</div>
	</section>

	<section class="section bg-section" id="made-with-essential-oil">
		<div class="container">
			<div class="columns is-variable is-8 is-align-items-center is-mobile">
                <div class="column is-7 is-offset-1">
        			<h1 class="subtitle">Made with essential oil</h1>
                    <p class="sub mt-5 is-nova">
                        We choose the finest quality essential oils for their natural healing properties for our body, mind, and soul. We verify its sustainability by partnering with responsible suppliers who are committed to protecting the people and the planet.
                        <br><br>
                        Our partners ensure that our essential oils are at their optimum quality when harvested by providing technical and agricultural advice to local farmers.
                        <br><br>
                        <b>#BEhonest</b>
                    </p>
                </div>
                <div class="column is-3">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/oils.png?v={{env('APP_VER')}}">
                    </figure>
                </div>
			</div>
		</div>
	</section>

	<section class="section" id="no-cruelty">
		<div class="container">
			<div class="columns is-variable is-8 is-align-items-center is-mobile">
                <div class="column is-3 is-offset-1">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/cruelty.png?v={{env('APP_VER')}}">
                    </figure>
                </div>
                <div class="column is-7">
        			<h1 class="subtitle">No cruelty</h1>
                    <p class="sub mt-5 is-nova">
                        We commit not to use animal-derived ingredients and no animal cruelty.
                    <br><br>
                        <b>#BEkind</b>
                    </p>
                </div>
			</div>
		</div>
	</section>

	<section class="section bg-section" id="dermatologically-tested">
		<div class="container">
			<div class="columns is-variable is-8 is-align-items-center is-mobile">
                <div class="column is-7 is-offset-1">
        			<h1 class="subtitle">Dermatologically tested</h1>
                    <p class="sub mt-5 is-nova">
                        Our scientists adopt a mindful yet meticulous approach when formulating our products. Their series of rigorous tests, evaluate safety, quality, stability, and efficacy. Dermatologically tested means our products have been tested on human skin, using cumulative irritancy testing on human volunteers. We believe in designing formulas that are mindful yet effective on skin.
                        <br><br>
                        <b>#BEmindful</b>
                </div>
                <div class="column is-3">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/skin.png?v={{env('APP_VER')}}">
                    </figure>
                </div>
			</div>
		</div>
	</section>

	<section class="section" id="plant-derived">
		<div class="container">
			<div class="columns is-variable is-8 is-align-items-center is-mobile">
                <div class="column is-3 is-offset-1">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/plant.png?v={{env('APP_VER')}}">
                    </figure>
                </div>
                <div class="column is-7">
        			<h1 class="subtitle">Plant derived</h1>
                    <p class="sub mt-5 is-nova">
                        We use thoughtfully chosen, plant derived active ingredients and essential oils because nature is rich with an array of nutrients that our skin is familiar with, and will easily absorb.  We infuse a good amount of these actives in our products to remain safe yet effective on the skin. We strive to create a unique aromatic and sensorial experience that is good for your well-being.
                        <br><br>
                        <b>#BEgood</b>
                    </p>
                </div>
			</div>
		</div>
	</section>

	<section class="section bg-section" id="recyclable-packaging">
		<div class="container">
			<div class="columns is-variable is-8 is-align-items-center is-mobile">
                <div class="column is-7 is-offset-1">
        			<h1 class="subtitle">Recyclable packaging</h1>
                    <p class="sub mt-5 is-nova">
                        All our packaging materials are recyclable and reusable. We encourage all our customers to reuse and recycle it. We hope to make our world a better place for many generations to come.
                        <br><br>
                        <b>#BEdifferent</b>
                    </p>
                </div>
                <div class="column is-3">
                    <figure class="image is-1by1">
                        <img class="lozad" data-src="/assets/images/impact/recycleable.png?v={{env('APP_VER')}}">
                    </figure>
                </div>
			</div>
		</div>
	</section>
    
    {{--<section class="section is-hidden-mobile">
        <div class="container">
            <div class="columns is-variable is-8 is-multiline is-align-items-center">
                <div class="column is-6 is-12-touch">
                    <h1 class="title has-text-centered-mobile">What we are doing</h1>
                    <p class="sub is-nova">
                        Botanical Essentials aims to help close
                        the funding gap required to end extreme
                        poverty by 2030. We aim to redress the
                        power imbalance between donor and doer
                        by generating and redistributing wealth,
                        using social enterprise and trust-based
                        philanthropy to amplify change-makers
                        exponentially.
                    </p>
                </div>
                <div class="column is-6 is-12-touch">
                    <ol>
                        <li>
                            <h1 class="subtitle">
                                BE will generate and redistribute
                                wealth using a social enterprise 
                                funding model.
                            </h1>
                            <p class="is-nova">
                                We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit. We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit.
                            </p>
                        </li>
                        <li>
                            <h1 class="subtitle">
                                Practising trust-based philanthropy
                            </h1>
                            <p class="is-nova">
                                We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit. We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit.
                            </p>
                        </li>
                        <li>
                            <h1 class="subtitle">
                                Funding impactful partnerships
                            </h1>
                            <p class="is-nova">
                                We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit. We are lorem ipsum dolor sit amet, consetetue adipiscing elit.
                            </p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section is-hidden-tablet">
        <div class="container">
            <div class="columns is-multiline is-align-items-center is-mobile">
                <div class="column is-5">
                    <h1 class="title">What we are doing</h1>
                </div>
                <div class="column is-7">
                    <p class="sub is-nova">
                        Botanical Essentials aims to help close
                        the funding gap required to end extreme
                        poverty by 2030. We aim to redress the
                        power imbalance between donor and doer
                        by generating and redistributing wealth,
                        using social enterprise and trust-based
                        philanthropy to amplify change-makers
                        exponentially.
                    </p>
                </div>
            </div>
        </div>
    </section>--}}
    
    {{--<section class="section bg-section is-hidden-tablet">
        <div class="container">
            <div>
                    <div class="impact-slider">
                        <ol start="1">
                            <li class="mb-0">
                                <h1 class="subtitle">
                                    BE will generate and redistribute
                                    wealth using a social enterprise 
                                    funding model.
                                </h1>
                                <p class="is-nova">
                                    We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit. We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit.
                                </p>
                            </li>
                        </ol>
                        <ol start="2">
                            <li>
                                <h1 class="subtitle">
                                    Practising trust-based philanthropy
                                </h1>
                                <p class="is-nova">
                                    We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit. We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit.
                                </p>
                            </li>
                        </ol>
                        <ol start="3">
                            <li>
                                <h1 class="subtitle">
                                    Funding impactful partnerships
                                </h1>
                                <p class="is-nova">
                                    We are lorem ipsum dolor sit amet, consetetue adipiscing elit.Lorem ipsum dolor sit amet, consetetue adipiscing elit. We are lorem ipsum dolor sit amet, consetetue adipiscing elit.
                                </p>
                            </li>
                        </ol>
                    </div>
                
            </div>
        </div>
    </section>--}}

    <section class="section pt-10 pb-10 is-hidden-mobile">
        <div class="container has-text-centered">
            <h1 class="title">
                It’s time for us to be the agents of change
                for a bigger purpose to the world.
                Start small, shall we?
            </h1>
        </div>
    </section>

    <section class="section bg-section pt-10 pb-10 is-hidden-tablet">
        <div class="container has-text-centered">
            <h1 class="title">
                It’s time for us to be the agent of change
                for a bigger purpose to the world.
                Start small, shall we?
            </h1>
        </div>
    </section>
    
    
@endsection

@section('scripts')
    <script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js?v={{env('APP_VER')}}"></script>
    <script type="text/javascript" src="/assets/js/slick.js?v={{env('APP_VER')}}"></script>
    <script>
        $(document).ready(function(){
            $('.impact-slider').slick({
                dots: false,
                arrows: true,
                prevArrow: '<svg style="left:-6%; width:50px; top:25%" class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg style="right:-6%; width:50px; top:25%" class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 1
            });
            $('.gallery-slider').slick({
                dots: false,
                arrows: true,
                autoplay:true,
                autoplaySpeed: 1000,
                prevArrow: '<svg style="left:-6%; width:80px; top:40%" class="a-left control-c prev slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                nextArrow: '<svg style="right:-6%; width:80px; top:40%" class="a-right control-c next slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.32 21.37"><g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg> <g id="Layer_2" data-name="Layer 2"> <g id="about"> <polyline class="slick-arrow" points="16.78 0.72 26.89 10.43 16.66 20.66" /> </g> </g> </svg>',
                slidesToShow: 1,
                adaptiveHeight: true,
            });
        });
    </script>
@endsection
