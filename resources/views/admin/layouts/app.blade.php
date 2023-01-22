<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

    <head>
        @include('layouts.meta')
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
        @yield('stylesheets')
        <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/bordered-layout.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.min.css?v={{env('APP_VER')}}">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/ext-component-toastr.css?v={{env('APP_VER')}}">
        <style>
            @media (max-width: 1199px){
                .logo-mobile{
                    opacity:1;
                    -webkit-transition: opacity 0.5s ease-in-out;
                    -moz-transition: opacity 0.5s ease-in-out;
                    -ms-transition: opacity 0.5s ease-in-out;
                    -o-transition: opacity 0.5s ease-in-out;
                    transition: opacity 0.5s ease-in-out;
                }
                .dropdown-item{
                    cursor:unset !important;
                }
                .dropdown-item.active, 
                .dropdown-item:active, 
                .dropdown-item:hover{
                    background-color:unset;
                    color:unset;
                }
            }

            @media (min-width: 1200px){
                .logo-mobile{
                    opacity:0;
                    -webkit-transition: opacity 0.5s ease-in-out;
                    -moz-transition: opacity 0.5s ease-in-out;
                    -ms-transition: opacity 0.5s ease-in-out;
                    -o-transition: opacity 0.5s ease-in-out;
                    transition: opacity 0.5s ease-in-out;
                }
            }
            .navbar-container{
                display:flex;
                justify-content: space-between;
                flex-wrap:nowrap;
            }
        </style>
    </head>


    <body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click"
        data-menu="vertical-menu-modern" data-col="">

        @include('admin.layouts.navbar')

        <div id="section-block"></div>
        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="flex-row nav navbar-nav">
                    <li class="mr-auto nav-item">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/app-assets/images/email/logo-214x68.png" alt="" style="height:60px">
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="pr-0 nav-link modern-nav-toggle" data-toggle="collapse">
                            <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                            <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="edit"></i>
                            <span class="menu-title text-truncate" data-i18n="Journal">Journal</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@if(Route::currentRouteName() == 'admin.journal' || Route::currentRouteName() == 'home')active @endif ">
                                <a class="d-flex align-items-center" href="{{ route('admin.journal') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="All journal">All journal</span>
                                </a>
                            </li>
                            <li class="@if(Route::currentRouteName() == 'admin.journal.create')active @endif ">
                                <a class="d-flex align-items-center" href="{{ route('admin.journal.create') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Add new journal">Add new journal</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--<li class="nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="shopping-cart"></i>
                            <span class="menu-title text-truncate" data-i18n="Product">Product</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@if(Route::currentRouteName() == 'admin.product')active @endif ">
                                <a class="d-flex align-items-center" href="{{ route('admin.product') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="All product">All product</span>
                                </a>
                            </li>
                            <li class="@if(Route::currentRouteName() == 'admin.product.create')active @endif ">
                                <a class="d-flex align-items-center" href="{{ route('admin.product.create') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Add new product">Add new product</span>
                                </a>
                            </li>
                        </ul>
                    </li>--}}
                </ul>
            </div>
        </div>
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="mb-2 content-header-left col-md-9 col-12">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="float-left mb-0 content-header-title" style="border-right:unset">
                                    @yield('title')
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    @yield('content')
                </div>
            </div>
        </div>
        
        <div class="text-left modal fade" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ganti Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('change-password') }}">
                        @csrf
                        <div class="modal-body">
                            <label>Password Lama: </label>
                            <div class="form-group">
                                <input name="old_password" type="password" placeholder="Password Lama" class="form-control">
                            </div>

                            <label>Password Baru: </label>
                            <div class="form-group">
                                <input name="password" type="password" placeholder="Password" class="form-control">
                            </div>

                            <label>Ulangi Password Baru: </label>
                            <div class="form-group">
                                <input name="password_confirmation" type="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ganti Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        <footer class="footer footer-static footer-light">
            <p class="clearfix mb-0">
                <span class="float-md-right d-block d-md-inline-block mt-25">
                    COPYRIGHT &copy; {{ date('Y') }} @if(env('WHITE_LABEL') === false)<a class="ml-25" href="https://digitalkonsultindo.co.id" target="_blank">Digital Konsultindo FA</a>@else<a class="ml-25" href="{{ env('APP_URL') }}" target="_blank">{{ env('APP_NAME') }}</a>@endif
                    <span class="d-none d-sm-inline-block">, All rights Reserved</span>
                </span>
            </p>
        </footer>
        <button class="btn btn-primary btn-icon scroll-top" type="button">
            <i data-feather="arrow-up"></i>
        </button>


        <script src="/app-assets/vendors/js/vendors.min.js?v={{env('APP_VER')}}"></script>
        <script src="/app-assets/vendors/js/extensions/js.cookie.min.js?v={{env('APP_VER')}}"></script>
        <script src="/app-assets/js/core/app-menu.js?v={{env('APP_VER')}}"></script>
        <script src="/app-assets/js/core/app.js?v={{env('APP_VER')}}"></script>
        <script src="/app-assets/vendors/js/extensions/toastr.min.js?v={{env('APP_VER')}}"></script>

        <script>
            $(window).on('load', function () {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            }) 
            
            
            function startAjaxLoader(){
                $.blockUI({
                    message: '<div class="text-white spinner-border" role="status"></div>',
                    timeout: 1000,
                    css: {
                        backgroundColor: 'transparent',
                        border: '0'
                    },
                        overlayCSS: {
                        opacity: 0.8
                    }
                });
            }
            function stopAjaxLoader(){
                $.unblockUI
                feather.replace({
                    width: 14,
                    height: 14
                });
            }

            //AVATAR FUNCTION
            !function(t,e){function r(r,a){r=r||"",a=a||60;var n,i,o,c,d,f=String(r).toUpperCase().split(" ");return n=1==f.length?f[0]?f[0].charAt(0):"?":f[0].charAt(0)+f[1].charAt(0),t.devicePixelRatio&&(a*=t.devicePixelRatio),i=(("?"==n?72:n.charCodeAt(0))-64)%20,(o=e.createElement("canvas")).width=a,o.height=a,(c=o.getContext("2d")).fillStyle=["#1abc9c","#2ecc71","#3498db","#9b59b6","#34495e","#16a085","#27ae60","#2980b9","#8e44ad","#2c3e50","#f1c40f","#e67e22","#e74c3c","#ecf0f1","#95a5a6","#f39c12","#d35400","#c0392b","#bdc3c7","#7f8c8d"][i-1],c.fillRect(0,0,o.width,o.height),c.font=Math.round(o.width/2)+"px Arial",c.textAlign="center",c.fillStyle="#FFF",c.fillText(n,a/2,a/1.5),d=o.toDataURL(),o=null,d}r.transform=function(){Array.prototype.forEach.call(e.querySelectorAll("img[avatar]"),function(t,e){e=t.getAttribute("avatar"),t.src=r(e,t.getAttribute("width")),t.removeAttribute("avatar"),t.setAttribute("alt",e)})},"function"==typeof define&&define.amd?define(function(){return r}):"undefined"!=typeof exports?("undefined"!=typeof module&&module.exports&&(exports=module.exports=r),exports.LetterAvatar=r):(window.LetterAvatar=r,e.addEventListener("DOMContentLoaded",function(t){r.transform()}))}(window,document);

            @if (session('status'))
                toastr.success('{{ session('status') }}', 'Success!', {
                    closeButton: true,
                    tapToDismiss: false
                });
            @endif
        </script>
        @yield('scripts')
    </body>

    @toastr_render
</html>
