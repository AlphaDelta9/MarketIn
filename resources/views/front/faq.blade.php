@extends('front.layouts.app')
@section('title','Frequently Asked Questions')
@section('descrtipion',env("DEFAULT_DESC"))
@section('stylesheets')
<style>
    .tabcontent {
        display: none;
        animation: fadeEffect 1s; /* Fading effect takes 1 second */
    }
    /* Go from zero to full opacity */
    @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
    }
    .tabs ul{
        justify-content:space-between;
        border:unset;
    }
    .tabs ul a{
        padding: 0.5em 0;
        border:unset;
    }
    .tablinks.active{
        border: 2px solid black;
        padding: 5px;
    }
    .tablinks.active svg{
        fill:#e1dcd6
    }
    .sub-2 span{
        text-align:left !important;
    }
</style>
@endsection
@section('content')
@include('front.layouts.navbar')
	<section class="section mt-10" style="padding-bottom:0;">
        <div class="container">
            <div class="columns is-multiline is-align-items-center">
                <div class="column is-12">
                    <h1 class="title has-text-centered">Frequently Asked Questions</h1>
                </div>
                <div class="column is-12">
                    
                    <div class="tabs">
                        <ul>
                            <li>
                                <a onclick="openTab(event, 'general-information')" class="tablinks subtitle @if(\Request::query('tab') == 'general-information' || \Request::query('tab') == '') active @endif">
                                    <span style="display: inline-flex;align-items: center;">
                                        <svg style="width:115px" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 330 330" viewBox="0 0 330 330"><path d="m165 0c-90.981 0-165 74.02-165 165s74.019 165 165 165 165-74.018 165-165-74.019-165-165-165zm0 300c-74.44 0-135-60.56-135-135s60.56-135 135-135 135 60.562 135 135-60.561 135-135 135z"/><path d="m165 70c-11.026 0-19.996 8.976-19.996 20.009 0 11.023 8.97 19.991 19.996 19.991s19.996-8.968 19.996-19.991c0-11.033-8.97-20.009-19.996-20.009z"/><path d="m165 140c-8.284 0-15 6.716-15 15v90c0 8.284 6.716 15 15 15s15-6.716 15-15v-90c0-8.284-6.716-15-15-15z"/></svg> 
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a onclick="openTab(event, 'shipping-delivery')" class="tablinks subtitle @if(\Request::query('tab') == 'shipping-delivery') active @endif">
                                    <span style="display: inline-flex;align-items: center;">
                                        <svg style="width:110px" enable-background="new 0 0 442 442" viewBox="0 0 442 442" xmlns="http://www.w3.org/2000/svg"><path d="m412.08 115.326c-.006-.322-.027-.643-.064-.961-.011-.1-.02-.201-.035-.3-.057-.388-.131-.773-.232-1.151-.013-.05-.032-.097-.046-.146-.094-.33-.206-.654-.333-.973-.041-.102-.085-.203-.129-.304-.126-.289-.266-.571-.42-.848-.039-.069-.073-.141-.113-.209-.203-.346-.426-.682-.672-1.004-.019-.025-.042-.049-.061-.074-.222-.285-.463-.558-.718-.82-.07-.072-.143-.142-.215-.212-.225-.217-.461-.424-.709-.622-.077-.062-.15-.126-.229-.185-.311-.234-.634-.457-.979-.657l-181.091-105.501c-3.111-1.813-6.956-1.813-10.067 0l-181.092 105.5c-.345.201-.668.423-.979.657-.079.059-.152.124-.229.185-.248.198-.484.405-.709.622-.073.07-.145.14-.215.212-.255.262-.496.535-.718.82-.02.025-.042.049-.061.074-.246.322-.468.658-.672 1.004-.04.068-.075.14-.113.209-.154.277-.294.559-.42.848-.044.101-.088.202-.129.304-.127.319-.239.643-.333.973-.014.049-.033.097-.046.146-.101.378-.175.763-.232 1.151-.014.099-.023.2-.035.3-.037.319-.058.639-.064.961-.001.058-.012.115-.012.174v211c0 3.559 1.891 6.849 4.966 8.641l181.092 105.5c.029.017.059.027.088.043.357.204.725.391 1.108.55.004.002.009.003.014.005.362.15.736.273 1.118.38.097.027.193.051.291.075.299.074.603.134.912.181.103.016.205.035.308.047.393.047.79.078 1.195.078s.803-.031 1.195-.078c.103-.012.205-.031.308-.047.309-.047.613-.107.912-.181.097-.024.194-.047.291-.075.382-.107.756-.23 1.118-.38.004-.002.009-.003.014-.005.383-.159.751-.346 1.108-.55.029-.016.059-.027.088-.043l181.092-105.5c3.075-1.792 4.966-5.082 4.966-8.641v-211c0-.058-.011-.114-.012-.173zm-191.08 94.101-70.68-41.177 161.226-93.927 70.681 41.177zm0-187.854 70.68 41.177-161.226 93.927-70.68-41.177zm171.092 299.179-161.092 93.849v-40.601c0-5.523-4.477-10-10-10s-10 4.477-10 10v40.601l-161.092-93.849v-187.853l75.626 44.058c.005.003.011.006.016.01l85.45 49.78v107.253c0 5.523 4.477 10 10 10s10-4.477 10-10v-107.253l161.092-93.848z"/><path d="m284.613 247.88c1.858 3.189 5.208 4.968 8.65 4.968 1.709 0 3.441-.438 5.024-1.361l36.584-21.313c4.772-2.78 6.387-8.902 3.607-13.674s-8.903-6.386-13.674-3.607l-36.584 21.313c-4.772 2.78-6.387 8.902-3.607 13.674z"/></svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!--/tabs is-centered-->
                    </div>
                </div>
            </div>
        </div>
	</section>

    <section class="section" id="answer" style="background-color:#e1dcd6; margin-bottom:50px;">
                      
        <div class="container">
            <div class="sub-2 tabcontent" id="general-information" style="@if(\Request::query('tab') == 'general-information' || \Request::query('tab') == '') display:block @endif">
                Where to buy BE products?
                <span class="mt-0">Our products are available on our official ecommerce stores at Tokopedia & Shopee under Botanical Essentials with orders and payments according to the following ecommerce terms and conditions.</span>
                        
                How to order products in bulk or for B2B?
                <span class="mt-0">To order in bulk and for B2B inquiry, please contact our email <b>hello@thebotanicalessentials.com</b></span>
                
                How do I use my discount code?
                <span class="mt-0">Discount code applies according to our official ecommerce (Tokopedia and Shopee) terms and conditions depending on the promotion period.</span>
                            
                Can I amend my order after it has gone through?
                <span class="mt-0">Once processed, we cannot amend orders since all orders and shipments will be under our official ecommerce terms and conditions. If you think you have submitted the wrong address in your orders, please contact us at <b>hello@thebotanicalessentials.com</b> immediately.</span>
                    
                Do you have an offline retail store?
                <span class="mt-0">We do not have one yet at the moment but stay tuned to our website or instagram <b>@botanicalessentials.id</b> for updates.</span>
            </div>
            <div class="sub-2 tabcontent" id="shipping-delivery" style="@if(\Request::query('tab') == 'shipping-delivery') display:block @endif">
                Where do we deliver?
                <span class="mt-0">We currently ship Nationwide within Indonesia.</span>
                    
                When will I receive my order?
                <span class="mt-0">Orders will be packed and sent within 24 - 48 hours during business days/working hours: Monday to Friday, 9 am to 4 pm.</span>
                    
                What if I receive the wrong product?
                <span class="mt-0">We are not accepting any refunds. However we can replace your items with the correct products once you have requested a return/ exchange to our customer service via ecommerce and email us at <b>hello@thebotanicalessentials.com</b> or chat us directly on our ecommerce chat box. After submitting a refund request to our official ecommerce stores, kindly drop the package to the nearest expedition partners in your city and send the package back to us ( this shipping fee will be under customer’s expense) . We will exchange the items once we confirm the products have not been used or damaged and you will receive the correct items. Shipping fee will be included.</span>
                            
                What happens if I entered the wrong address for my order?
                <span class="mt-0">Please make sure your address is correct before submitting the order. If you think the address may not be correct, do contact us immediately and we will do our best to assist.
                Our official customer service <b>hello@thebotanicalessentials.com</b>
                or chat us directly on our Ecommerce chat box</span>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
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
        document.getElementById('answer').style.background = "#e1dcd6"
        evt.currentTarget.className += " active";
    }
</script>
@endsection
