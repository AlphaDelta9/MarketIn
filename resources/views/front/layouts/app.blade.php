<!DOCTYPE html>
<html>

<head>
	@include('layouts.meta')
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    <meta content="@yield('title') | Botanical Essentials" property="og:title">
    <meta content="@yield('description')" name="description">
    <meta content="@yield('description')" property="og:description">
    @if(Route::currentRouteName() == 'journal.show' || Route::currentRouteName() == 'shop.show')
        <meta content="@yield('image')" property="og:image">
        <meta content="@yield('image_width')" property="og:image:width">
        <meta content="@yield('image_height')" property="og:image:height">
        <meta content="summary_large_image" name="twitter:card">
        <meta content="@yield('updated_at')" property="article:modified_time">
        <meta content="Est. reading time" name="twitter:label1">
        <meta content="@yield('reading_time')" name="twitter:data1">
    @else
        <meta content="/app-assets/images/favicon/android-icon-192x192.png" property="og:image">
        <meta content="192" property="og:image:width">
        <meta content="192" property="og:image:height">
    @endif
	<link rel="stylesheet" href="/assets/css/index.css?v={{env('APP_VER')}}">
	<link rel="stylesheet" href="/assets/css/bulma.css?v={{env('APP_VER')}}">
    <link rel="stylesheet" href="{{ asset('others/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
	<script src="{{asset('js/tailwindcss.js')}}"></script>
	<style>

		@media (max-width: 499px){
    	    #offer-modal .offer-content{
    	        padding: 15px 0% !important;
    	    }
    	}
	    #offer-modal .delete{
	        height: 45px;
            max-height: 45px;
            max-width: 45px;
            min-height: 45px;
            min-width: 45px;
            background-color:unset;
	    }
	    #offer-modal .offer-content{
	        padding: 15px 4%;
	    }
	    #offer-modal .delete::before,
	    #offer-modal .modal-close::before{
	        height: 40px;
            width: 10%;
            background-color:black;
	    }
	    #offer-modal .delete::after,
	    #offer-modal .modal-close::after{
	        height: 10%;
            width: 40px;
            background-color:black;
	    }
	    #offer-modal .modal-card{
	        box-shadow: 7px 8px 5px 2px rgba(0, 0, 0, 0.3);
	    }
	    #offer-modal .modal-card-head{
	        border-bottom:unset;
	        border-top-left-radius:unset;
	        border-top-right-radius:unset;
	    }
	    #offer-modal .modal-card-foot{
	        border-top:unset;
	        border-bottom-left-radius: unset;
	        border-bottom-right-radius:unset;
	    }
	    #offer-modal .modal-card{
	        background-color:#C5BEBE;
	    }
	    #offer-modal .modal-card-head,
	    #offer-modal .modal-card-foot,
	    #offer-modal .modal-card-body{
	        background-color:unset;
	    }
	    #offer-modal .input{
	        border: 3px solid black;
            border-radius: unset;
            background-color:transparent;
            width:80%;
            height:3em;
	    }
	    #offer-modal input::placeholder{
	        color:#4D4D4D;
	    }
    	@media screen and (min-width: 1023px){
    	    #navbarBasicExample{
    	        margin-left:2rem;
    	    }
    	}
        *{
            outline:none;
        }
	    a:focus {
            outline: none;
        }
        .patchouli img, .ylang img, .bergamot img{
            /*height:240px;*/
			height: 292px;
            width: auto !important;
            margin:auto;
            object-fit:contain;
        }
		@media(max-width:799px){
			.patchouli img, .ylang img, .bergamot img{
            /*height:240px;*/
			height: 180px;

        	}
            .control-c{
                width:60px;
            }
            .a-right, .a-left{
                top:30%;
            }
            /* .navbar.transparent{
                position:relative;
            } */
            .image-section img{
                min-height:unset;
                object-fit:contain
            }
            #filter .is-6-desktop{
                zoom:70%
            }
            #shop .sub-2,
            .shop-slider .sub-2{
                zoom:90%;
            }
            #shop .sub-2 span,
            .shop-slider .sub-2 span{
                zoom:80%
            }

            /* #transparent-navbar{
                position:fixed;
                width:100%;
            } */
            /* .navbar .navbar-menu.is-active{
                margin-top:10px;
            } */

            /* #transparent-navbar + section,
            #transparent-navbar + #data{
                margin-top:72px !important;
            } */
        }
        @media(max-width:499px){
			.patchouli img, .ylang img, .bergamot img{
            /*height:240px;*/
			height: 140px;

        	}
            .control-c{
                width:50px;
            }
            .a-right, .a-left{
                top:30%;
            }
            .navbar.transparent{
                position:relative;
            }
            .image-section img{
                min-height:unset;
                object-fit:contain
            }
            #filter .is-6-desktop{
                zoom:70%
            }
            #shop .sub-2,
            .shop-slider .sub-2{
                zoom:90%;
            }
            #shop .sub-2 span,
            .shop-slider .sub-2 span{
                zoom:80%
            }

            #transparent-navbar{
                position:fixed;
                width:100%;
            }
            .navbar .navbar-menu.is-active{
                margin-top:10px;
            }

            #transparent-navbar + section,
            #transparent-navbar + #data{
                margin-top:72px !important;
            }
        }

        .image-section img{
            min-height:unset;
        }

        /*@media (min-width: 1081px){*/
        /*    .image-section img{*/
        /*        height:100vh;*/
        /*    }*/
        /*}*/
        @media screen and (min-width: 1024px){
            .navbar > .container .navbar-menu, .container > .navbar .navbar-menu{
                margin-right:unset !important;
            }
        }
        #shop .product-title,
        .shop-slider .product-title{
            min-height: 97px;
        }
        .sub-2 span{
            text-align:center;
        }
        @media screen and (max-width: 768px){
            #shop .product-title,
            .shop-slider .product-title{
                min-height: 80px;
            }
        }
        @media (max-width: 499px){
            #shop .product-title,
            .shop-slider .product-title{
                min-height: 60px;
            }
        }
	</style>
	@yield('stylesheets')
	@stack('stylesheets')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W82ZQW2E0H"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-W82ZQW2E0H');
    </script>
</head>

<body>
	@yield('content')

	<footer class="footer">
		<div class="container">
            <div class="top mb-4 text-center">
                Komang Andreawan Ambri | 2301904181
            </div>
            <div class="top mb-4 text-center">
                Michael Alexander Lienardy | 2301907353
            </div>
            <div class="top mb-4 text-center">
                Tenny Agatha Indah | 2301858175
            </div>
		</div>
	</footer>

	<script src="/assets/js/main.js?v={{env('APP_VER')}}"></script>
	<script type="text/javascript" src="/app-assets/vendors/js/jquery/jquery.min.js?v={{env('APP_VER')}}"></script>
	@yield('scripts')
	@stack('scripts')
</body>

</html>
