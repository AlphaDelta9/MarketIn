    <section class="section is-relative">
        <div class="container">
            <div class="columns is-variable is-8 is-multiline is-align-items-center">
                <div class="column is-6 is-12-touch has-text-centered">
                    <img src="/assets/images/heroes/bergamot.png?v={{env('APP_VER')}}" alt="">
					<img class="heroes-text" src="/assets/images/bergamot-text.png?v={{env('APP_VER')}}" alt="" style="margin:auto; width:68% !important">
                </div>
                <div class="column is-6 is-12-touch">
                    <h1 class="title has-text-centered-mobile" id="title">You are<br> #TeamBergamot!</h1>
                    <p class="sub" id="description">You have a strong will and are very driven towards achieving your goals. You are the definition of a real adventurer, with wishlists and wanderlusts. Sometimes people misread your spicy personality when actually you’re just being honest and outspoken.</p>
                    <div class="mt-5 pt-5">
                        <a id="share-result" class="button is-uppercase mb-5" style="">Share Result</a>
                        <a href="{{ route('quiz') }}" class="button-outline is-uppercase" style="font-size:1.19rem;line-height:7.2rem">Take Quiz Again</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-section mb-10" id="shop">
        <div class="container has-text-centered pb-5">
            <h1 class="title">Here's our mini pick for you</h1>
            <div class="pt-5 columns is-multiline is-mobile is-variable is-5 is-justify-content-center">
                <div class="column is-4-desktop is-4-tablet is-6-mobile bergamot">
                    <figure class="image">
                        <img class="lozad" src="/assets/images/shop/bw-bergamot-300-1.png?v={{env('APP_VER')}}" alt="">
                    </figure>
                    <div class="sub-2 has-text-centered pt-5">Botanical Essentials Body Wash PATCHOULI 300ml
                        <span>
                            300 ml
                        </span>
                    </div>
                </div>
                <div class="column is-4-desktop is-4-tablet is-6-mobile bergamot">
                    <figure class="image">
                        <img class="lozad" src="/assets/images/shop/hw-bergamot-300-1.png?v={{env('APP_VER')}}" alt="">
                    </figure>
                    <div class="sub-2 has-text-centered pt-5">Botanical Essentials Antibacterial Hand Wash BERGAMOT 300ml
                        <span>
                            300 ml
                        </span>
                    </div>
                </div>
                <div class="column is-4-desktop is-4-tablet is-6-mobile bergamot">
                    <figure class="image">
                        <img class="lozad" src="/assets/images/shop/hs-bergamot-60-1.png?v={{env('APP_VER')}}" alt="">
                    </figure>
                    <div class="sub-2 has-text-centered pt-5">Botanical Essentials Hand sanitizer BERGAMOT 60ml
                        <span>
                            60 ml
                        </span>
                    </div>
                </div>
            </div>
            <div class="mt-5 pt-5">
                <a id="#" class="button is-uppercase" style="">Buy Now</a>
            </div>
        </div>
    </section>