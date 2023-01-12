	<section class="section" id="filter">
	    <div class="container">
	        <div class="columns is-multiline is-mobile">
	            <div class="column is-3-desktop is-4-tablet is-12-mobile">
	                <h1 class="title">Shop {{ $title }}</h1>
	            </div>
	            <div
	                class="column is-6-desktop is-8-tablet is-offset-3-desktop is-12-mobile has-text-right-desktop is-align-self-flex-end">
	                <div class="columns sub-3 is-mobile is-multiline">
	                    <div class="column is-2-tablet is-6-mobile">
	                        <a @if(Route::currentRouteName()=='shop.all' ) href="javascript:void(0);" class="is-active"
	                            @else href="{{ route('shop.all') }}#filter" @endif>All</a>
	                    </div>
	                    <div class="column is-3-tablet is-6-mobile">
	                        <a @if(in_array(Route::currentRouteName(),['shop.by-hero']) )
	                            href="javascript:void(0);" class="is-active" @elseif(in_array(Route::currentRouteName(),['shop.by-hero.hero'])) class="is-active" @else href="{{ route('shop.by-hero') }}#filter"
	                            @endif>By Hero</a>
	                    </div>
	                    <div class="column is-4-tablet is-6-mobile">
	                        <a @if(in_array(Route::currentRouteName(),['shop.by-category']) )
	                            href="javascript:void(0);" class="is-active" @elseif(in_array(Route::currentRouteName(),['shop.by-category.category'])) class="is-active" @else href="{{ route('shop.by-category') }}#filter"
	                            @endif>By Category</a>
	                    </div>
	                    <div class="column is-3-tablet is-6-mobile">
	                        <a @if(in_array(Route::currentRouteName(),['shop.by-benefit']) )
	                            href="javascript:void(0);" class="is-active" @elseif(in_array(Route::currentRouteName(),['shop.by-benefit.benefit'])) class="is-active" @else href="{{ route('shop.by-benefit') }}#filter"
	                            @endif>By Benefit</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
