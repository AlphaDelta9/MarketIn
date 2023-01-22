@push('stylesheets')
    <link rel="stylesheet" href="/assets/css/slick.css">
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
    </style>
@endpush
    <div class="modal" id="offer-modal">
        <div class="modal-background"></div>
        <div class="modal-card" style="position:relative">
                <button class="delete" aria-label="close" style="position:absolute; top:8px;right:15px;"></button>
            <div class="offer-content">
                <form id="offer-form">
                    <section class="modal-card-body" style="text-align:center">
                        <img src="/assets/images/logo.png" style="width:180px">
                        <h2 class="subtitle mt-3">BE THE FIRST TO KNOW OUR EXCLUSIVE OFFERS!</h2>
                        <p class="sub">Join our mailing list to receive the latest updates and promotions</p>
                        <input required name="email" class="input mt-4" type="email" placeholder="Enter your email address">
                        <input required name="phone" class="input mt-3" type="text" placeholder="Phone number">
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button" style="margin:auto">SUBSCRIBE</button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
@push('scripts')

	<script src="/app-assets/vendors/js/extensions/js.cookie.min.js?v=3.5"></script>
    <script>
        if(!Cookies.get('offer-modal')){
            $('#offer-modal').addClass('is-active');
            $('html').css('overflow','hidden');
        }
        $('#offer-form').submit(function(e){
            e.preventDefault(); 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('subscribe.popup')}}",
                type: 'post',
                data: $("#offer-form").serialize(),
                dataType: 'JSON',
                success: function (response) {
                    $('html').css('overflow','auto');
                    $('#offer-modal').removeClass('is-active');
                    Cookies.set('offer-modal', 'active', { expires: 7 })
                },
                error: function (xhr) {
                    $('html').css('overflow','auto');
                    $('#offer-modal').removeClass('is-active');
                    Cookies.set('offer-modal', 'active', { expires: 7 })
                }
            })
        });
        $('#offer-modal .delete').click(function(){
            $('html').css('overflow','auto');
            $('#offer-modal').removeClass('is-active');
            Cookies.set('offer-modal', 'active', { expires: 7 })
        })
        
    </script>
@endpush