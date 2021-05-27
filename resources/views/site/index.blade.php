@extends('layouts.site')
@section('title', 'Home')
@section('content')

<div class="b-main-slider slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="920px"
data-slider-arrows="false" data-slider-buttons="false">
<div class="sp-slides">
    @foreach ($banners as $banner)
        <div class="b-main-slider__slide b-main-slider__slide-1 sp-slide"><img class="sp-image" src="/images/banners/{{ $banner->image }}" alt="slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sp-layer" data-width="100%" data-show-transition="left" data-hide-transition="left"
                            data-show-duration="800" data-show-delay="400" data-hide-delay="400">
                            <div class="b-main-slider__title-wrap">
                                <div class="b-main-slider__slogan">{{ $banner->slogan }}</div>
                                <div class="b-main-slider__title">{{ $banner->title }}</div>
                                @if ($banner->link > '')
                                    <div class="b-main-slider__label text-secondary">
                                        <a href="/{{ $banner->link }}">Explore Now</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
    <!-- end .b-main-slider-->
    <div class="b-about">
        <div class="ui-decor ui-decor_down"></div>
        <div class="container">
            <div class="b-main-filter-content tab-content" id="findTabContent">
                <form action="/showroom" method="POST">
                    @csrf
                    <div class="tab-pane fade show active" id="content-allCar">
                        <div class="row align-items-end no-gutters">
                            <div class="b-main-filter__main col-lg">
                                <div class="b-main-filter__inner row no-gutters">
                                    <div class="b-main-filter__item col-md-4">
                                        <div class="b-main-filter__label">Select Boat Type</div>
                                        <div class="b-main-filter__selector">
                                            <select class="selectpicker" data-width="100%" data-style="ui-select"
                                                name="category" data-live-search="true">
                                                {!! $categories !!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="b-main-filter__item col-md-4">
                                        <div class="b-main-filter__label">Conditionl</div>
                                        <div class="b-main-filter__selector">
                                            <select class="selectpicker" data-width="100%" data-style="ui-select"
                                                name="condition">
                                                <option value="">Any</option>
                                                <option value="1">New</option>
                                                <option value="0">Used</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="b-main-filter__item col-md-4">
                                        <div class="b-main-filter__label">Price Range</div>
                                        <div class="b-main-filter__selector">
                                            <select class="selectpicker" data-width="100%" data-style="ui-select"
                                                name="price_range">
                                                <option value="">Any</option>
                                                <option value="-10">
                                                    < 10K</option>
                                                <option value="-20">>10K < 25K</option>
                                                <option value="-50">>25K < 50K</option>
                                                <option value="50-100">> 50K < 100K</option>
                                                <option value="100-200">> 100k < 200K</option>
                                                <option value="200-550">> 200k < 500K</option>
                                                <option value="500-1m">> 500k < 1M</option>
                                                <option value="1m+">1M+</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <button class="b-main-filter__btn btn btn-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="text-left">
                        <h2 class="ui-title">Providing a large fleet of Boats for a perfect experience</h2>
                        <div class="ui-content">
                            <p>Boat Centre - Established in 1998 , was borne with the passion of boating and fishing by the
                                owner and CEO Shandon Hawman.
                                <br>Early on with the introduction of online technology and the advancing internet services
                                <br>Boat Centre soon evolved and entred in, creating the first South African online boating
                                website.
                                <br>Boat Centre soon was became and was renowned as - <strong>Your</strong><span
                                    style="color:#f1c40f"> No 1</span> <strong>Online boating solution</strong>.
                            <ul class="arrow-list">
                                <li><i class="fas fa-long-arrow-alt-right"></i>Fishing & Bass Boats</li>
                                <li><i class="fas fa-long-arrow-alt-right"></i>Premium Boats & Yachts</li>
                                <li><i class="fas fa-long-arrow-alt-right"></i>Our Professional Approach</li>
                                <li><i class="fas fa-long-arrow-alt-right"></i>Quality Service Guaranteed</li>
                                <li><i class="fas fa-long-arrow-alt-right"></i>Ineternational Exports</li>
                            </ul>
                            {{-- <div class="gap25"></div> <img src="{{ asset('images/sign.jpg') }}" alt="sign" class="sign">
                            <span class="sign">CEO, Autlines Boat Rentals</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"> <img src="{{ asset('images/2356456.png') }}" alt="photo" class="about-image"> </div>
            </div>
        </div>
    </div>
    <!-- end .b-services-->
    <div class="section-advantages">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="b-advantages">
                        <div class="ic flaticon-boat text-secondary"></div>
                        <div class="b-advantages__main">
                            <div class="b-advantages__title">Priceless Experience</div>
                            <div class="decore01"></div>
                            <div class="b-advantages__info">Speacialising in fishing boats, but offering the local market a full variety of vessels from the pleasure boats to high end luxury yachts.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="b-advantages">
                        <div class="ic flaticon-island text-secondary"></div>
                        <div class="b-advantages__main">
                            <div class="b-advantages__title">International Exports</div>
                            <div class="decore01"></div>
                            <div class="b-advantages__info">Boat Centre soon extended their services and exported boats to countries across their borders. Now operating internationally with the same service excellence that we first started with.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="b-advantages">
                        <div class="ic flaticon-yatch text-secondary"></div>
                        <div class="b-advantages__main">
                            <div class="b-advantages__title">Manufactur / Design </div>
                            <div class="decore01"></div>
                            <div class="b-advantages__info">Dealing with numerous manufacturers and being involved in boat design and projects over many years, we have learnt and know the various hulls, history and origin of many vessels built both within our borders and abroad.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-goods">
        <div class="section-default section-goods__inner bg-dark">
            <div class="ui-decor ui-decor_mirror ui-decor_center"></div>
            <div class="container">
                <div class="text-center">
                    <h2 class="ui-title ui-title_light">Features and Specials</h2>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <p>Dolore magna aliqua enim ad minim veniam, quis nostrud exercitation aliquip duis aute irure
                                dolorin <br> reprehenderits vol dolore fugiat nulla pariatur excepteur sint occaecat
                                cupidatat.</p> <img src="images/decore03.png" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section-goods__list">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y001.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Golden Odyssey</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$140
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y002.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Black pearl</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$325
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y003.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Sea Senora</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$450
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y004.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Fish Tales</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$160
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y005.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Island Time</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$150
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y006.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Cozmic Sunny</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$470
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y007.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Fast Serenity</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$155
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="b-goods">
                            <a class="b-goods__img" href="#"><img class="img-scale" src="{{ asset('images/y008.jpg') }}"
                                    alt="photo"></a>
                            <div class="b-goods__main">
                                <div class="row no-gutters">
                                    <div class="col"><a class="b-goods__title" href="#">Cozmic Sunny</a>
                                        <div class="b-goods__info">Stock#: 45098ES - 4 door, White, 2.5L, FWD, Automatic
                                            6-Speed, 2.5L 5 cyls, Florida CA</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="b-goods__price text-primary"><span
                                                class="b-goods__price-title">DEALER<br>PRICE</span><span
                                                class="b-goods__price-number">$230
                                                <span class="b-goods__price-after-price">Per Day</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-goods-descrip_nev_wrap">
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span
                                                class="b-goods-descrip__info">12 Guests</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span
                                                class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                    </div>
                                    <div class="b-goods-descrip_nev">
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span
                                                class="b-goods-descrip__info"> 44 Feet</span> </div>
                                        <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span
                                                class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3"><a class="btn btn-border view-all-boats" href="/showroom">view all boats</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-progress  ">
        <div class="container">
            <div class="dw-wrap">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="dw-img"><img src="{{ asset('images/deal-weak.jpg') }}" alt="photo"></div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="dw-info">
                            <h5 class="decore-title">Deal Of The Week

                            </h5>
                            <h3>DayDream Boat <span>Rent For $800 / HRS</span></h3>
                            <div class="dw-text">Builder /Model: French Waves | Type/Year: House Boat 2019 | Length: 105 FT
                                32 M Charter Guests: 200 | Crew Members: 6</div>
                            <div class="dw-footer"><i class="fas fa-phone-square"></i> Booking a Charter Boat <strong>+1 755
                                    302 8549</strong></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <!-- Counters -->
				<div class="row bg-counters">
					<!-- Counter #1 -->
					<div class="col-12 col-md-6 col-lg-3">
						<div class="b-progress-list cr-counters bg-accent-1 bg-accent-color1">
							<div class="cr-counters__icon"> <i class="flaticon-sailor"></i> </div>
							<div class="cr-counters__numbers js-chart" data-percent="240"> <span class="js-percent"></span> <span>+</span> </div>
							<div class="cr-counters__description">Travel Destinations Offered</div>
						</div>
					</div>
					<!-- Counter #2 -->
					<div class="col-12 col-md-6 col-lg-3">
						<div class="cr-counters bg-accent-2 bg-accent-color2 ">
							<div class="cr-counters__icon"> <i class="flaticon-snorkel"></i> </div>
							<div class="cr-counters__numbers js-chart" data-percent="980"> <span class="js-percent"></span> <span>+</span></div>
							<div class="cr-counters__description">Travel Destinations Offered</div>
						</div>
					</div>
					<!-- Counter #3 -->
					<div class="col-12 col-md-6 col-lg-3">
						<div class="cr-counters bg-accent-1 bg-accent-color3">
							<div class="cr-counters__icon"> <i class="flaticon-island-1"></i> </div>
							<div class="cr-counters__numbers js-chart" data-percent="175"> <span class="js-percent"></span> <span>+</span></div>
							<div class="cr-counters__description">Travel Destinations Offered</div>
						</div>
					</div>
					<!-- Counter #4 -->
					<div class="col-12 col-md-6 col-lg-3">
						<div class="cr-counters  bg-accent-color4">
							<div class="cr-counters__icon"> <i class="flaticon-chef-hat"></i> </div>
							<div class="cr-counters__numbers js-chart" data-percent="630"> <span class="js-percent"></span> <span>+</span></div>
							<div class="cr-counters__description">Travel Destinations Offered</div>
						</div>
					</div>
				</div>
				<!-- End of Counters --> --}}
        </div>
    </section>
    <section class="section-goods-offers">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-left offers-left">
                    <h2 class="ui-title">Premium Boat<br>
                        Rental Services</h2> <img src="/images/decore02.png" alt="photo">
                    <div class="offers-left-text">
                        <p>Eorem ipsum dolor amet consectetur sed adipisicing elit sed eiusmod tempor et dolore magna aliqua
                            minim veniam, quis nostrud exercitation aliquip ex ea consequat duis aute irure dolorin.</p>
                    </div>

                    <a class="btn btn-primary" href="#">view more</a>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="b-offers-slider ui-slider_arr-prim js-slider"
                    data-slick="{&quot;slidesToShow&quot;: 3, &quot;slidesToScroll&quot;: 1, &quot;dots&quot;: false, &quot;arrows&quot;: true, &quot;autoplay&quot;: true,   &quot;responsive&quot;: [{&quot;breakpoint&quot;: 992, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1}}]}">
                    <div class="b-offers-nevica">
                        <div class="b-offers-nevica-photo"> <img src="{{ asset('images/offers001.jpg') }}" alt="photo">
                        </div>
                        <h6>Water Sports Boat</h6>
                        <div class="decore01"></div>
                        <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis
                            nostrs sed citation ullam coy laboris nisit.</p>
                    </div>
                    <!-- end .b-offers-->
                    <div class="b-offers-nevica">
                        <div class="b-offers-nevica-photo"> <img src="{{ asset('images/offers002.jpg') }}" alt="photo">
                        </div>
                        <h6>Family Gathering</h6>
                        <div class="decore01"></div>
                        <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis
                            nostrs sed citation ullam coy laboris nisit.</p>
                    </div>
                    <!-- end .b-offers-->
                    <div class="b-offers-nevica">
                        <div class="b-offers-nevica-photo"> <img src="{{ asset('images/offers003.jpg') }}" alt="photo">
                        </div>
                        <h6>Corporate Events</h6>
                        <div class="decore01"></div>
                        <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis
                            nostrs sed citation ullam coy laboris nisit.</p>
                    </div>
                    <!-- end .b-offers-->
                    <div class="b-offers-nevica">
                        <div class="b-offers-nevica-photo"> <img src="{{ asset('images/offers004.jpg') }}" alt="photo">
                        </div>
                        <h6>Celebrations events</h6>
                        <div class="decore01"></div>
                        <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis
                            nostrs sed citation ullam coy laboris nisit.</p>
                    </div>
                    <!-- end .b-offers-->
                </div>
            </div>
        </div>
    </section>
    <section class="section-video section-default section-goods__inner bg-dark ">

        <div class="ui-decor ui-decor_mirror ui-decor_center"></div>


        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="video-info">
                        <p><img src="/images/decore02.png" alt="decore">Give us a call or drop an email, We endeavor to
                            answer within 24 hours</p>
                        <h4>We’ve Exclusive Boats With Charter Offers</h4>
                        <h5>LET’S PLAN YOUR NEXT TOUR!</h5>
                        <ul>
                            <li><i class="fas fa-phone-square"></i> Call Us Today: +1 755 302 8549</li>
                            <li><i class="fas fa-envelope-square"></i> Email: <a
                                    href="mailto:name@rmy-domain.com">support@my-domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <a class="video-btn venobox ternary-video-btn-style vbox-item popup-youtube" data-vbtype="video"
                        data-autoplay="true" href="../../watch.html?v=JAIvWg4iQHo"><i class="fa fa-play"></i>
                        <div class="pulsing-bg"></div>
                        <span>Watch A Tour</span>
                    </a>


                </div>
            </div>
        </div>
    </section>
    <section class="section-gallery">
        <div class="container">
            <div class="text-center">
                <h2 class="ui-title">Picture Gallery</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Dolore magna aliqua enim ad minim veniam, quis nostrud exercitation aliquip duis aute irure
                            dolorin <br> reprehenderits vol dolore fugiat nulla pariatur excepteur sint occaecat cupidatat.
                        </p>
                        <img src="/images/decore03.png" alt="photo">
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-gallery js-zoom-gallery">
            <div class="row no-gutters">
                <div class="col-lg-3 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal001.jpg" alt="photo"></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal003.jpg" alt="photo"></a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal009.jpg" alt="photo"></a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal005.jpg" alt="photo"></a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-5 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal006.jpg" alt="photo"></a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal008.jpg" alt="photo"></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal007.jpg" alt="photo"></a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a class="ui-gallery__img js-zoom-gallery__item" href="#"><img class="img-scale"
                            src="/images/gal004.jpg" alt="photo"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-reviews area-bg area-bg_dark area-bg_op_90">
        <div class="area-bg__inner section-default">
            <div class="container text-center">
                <div class="text-center">
                    <h2 class="ui-title ui-title_light">What People Says...</h2>
                    <div class="row">
                        <div class="col-md-8 offset-md-2"> <img src="/images/decore03.png" alt="photo"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="b-reviews-slider js-slider"
                            data-slick="{&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;autoplay&quot;: true, &quot;dots&quot;: false, &quot;arrows&quot;: false}">
                            <blockquote class="b-reviews">
                                <div class="b-seller__img"><img class="img-scale" src="/images/avatar.jpg" alt="foto"></div>
                                <div class="b-reviews__text">Exercit ullamco laboris nisiut aliquip ex ea com irure dolor
                                    reprehs tempor incididunt ut labore dolore magna aliqua quis nostrud sed exercitation
                                    ullamco laboris nisiut duis aute irure sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Donald James</div>
                                    <div class="b-reviews__category">Customer</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                            <blockquote class="b-reviews">
                                <div class="b-seller__img"><img class="img-scale" src="/images/avatar.jpg" alt="foto"></div>
                                <div class="b-reviews__text">Exercit ullamco laboris nisiut aliquip ex ea com irure dolor
                                    reprehs tempor incididunt ut labore dolore magna aliqua quis nostrud sed exercitation
                                    ullamco laboris nisiut duis aute irure sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Donald James</div>
                                    <div class="b-reviews__category">Customer</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                            <blockquote class="b-reviews">
                                <div class="b-seller__img"><img class="img-scale" src="/images/avatar.jpg" alt="foto"></div>
                                <div class="b-reviews__text">Exercit ullamco laboris nisiut aliquip ex ea com irure dolor
                                    reprehs tempor incididunt ut labore dolore magna aliqua quis nostrud sed exercitation
                                    ullamco laboris nisiut duis aute irure sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Donald James</div>
                                    <div class="b-reviews__category">Customer</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-article section-default">
        <div class="container">
            <div class="text-center">
                <h2 class="ui-title">Industry News</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Dolore magna aliqua enim ad minim veniam, quis nostrud exercitation aliquip duis aute irure
                            dolorin <br> reprehenderits vol dolore fugiat nulla pariatur excepteur sint occaecat cupidatat.
                        </p> <img src="/images/decore04.png" alt="photo">
                    </div>
                </div>
            </div>
            <div class="pt-2 row">
                <div class="col-xl-4 col-md-4">
                    <section class="b-post b-post-3">
                        <div class="entry-media">
                            <a href="post.html"><img class="img-scale" src="/images/sailing-on-vacation-EUT5FWG.jpg"
                                    alt="photo"></a>
                        </div>
                        <div class="entry-meta">
                            <time class="entry-meta__item" datetime="2019-01-31">June 15, 2020</time> <span
                                class="entry-meta__item">
                                by
                                <a class="entry-meta__link text-primary" href="blog.html">Nevica</a></span>
                        </div>
                        <div class="entry-main">
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="post.html">Corporate yacht for smooth
                                        running of main events</a></h2>
                            </div>
                            <div class="entry-content">Aiusmod tempor incididunt labore dolore magna ust enim sed veniams
                                quis nostrud</div>
                        </div> <a class="btn-post" href="post.html">Read More</a>
                    </section>
                    <!-- end .b-post-->
                </div>
                <div class="col-xl-4 col-md-4">
                    <section class="b-post b-post-3">
                        <div class="entry-media">
                            <a href="post.html"><img class="img-scale" src="/images/326576456534.jpg" alt="photo"></a>
                        </div>
                        <div class="entry-meta">
                            <time class="entry-meta__item" datetime="2019-01-31">June 12, 2020</time> <span
                                class="entry-meta__item">
                                by
                                <a class="entry-meta__link text-primary" href="blog.html">Nevica</a></span>
                        </div>
                        <div class="entry-main">
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="post.html">The Best staff members for
                                        your service available</a></h2>
                            </div>
                            <div class="entry-content">Aiusmod tempor incididunt labore dolore magna ust enim sed veniams
                                quis nostrud</div>
                        </div> <a class="btn-post" href="post.html">Read More</a>
                    </section>
                    <!-- end .b-post-->
                </div>
                <div class="col-xl-4 col-md-4">
                    <section class="b-post b-post-3">
                        <div class="entry-media">
                            <a href="post.html"><img class="img-scale" src="/images/sailing-on-vacation-EUT5FWG34.jpg"
                                    alt="photo"></a>
                        </div>
                        <div class="entry-meta">
                            <time class="entry-meta__item" datetime="2019-01-31">June 3, 2020</time> <span
                                class="entry-meta__item">
                                by
                                <a class="entry-meta__link text-primary" href="blog.html">Nevica</a></span>
                        </div>
                        <div class="entry-main">
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="post.html">Don’t worry about comfort
                                        and company facilities</a></h2>
                            </div>
                            <div class="entry-content">Aiusmod tempor incididunt labore dolore magna ust enim sed veniams
                                quis nostrud</div>
                        </div> <a class="btn-post" href="post.html">Read More</a>
                    </section>
                    <!-- end .b-post-->
                </div>
            </div>
        </div>
    </section>
    <section class="section-default section-banners">
        <div class="container">
            <div class="text-center"> <img src="/images/banners.jpg" alt="photo"> </div>
        </div>
    </section>

@endsection
