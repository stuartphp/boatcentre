@extends('layouts.site')
@section('title', 'Home')
@section('content')

<div class="b-main-slider slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="920px"
data-slider-arrows="false" data-slider-buttons="false">
<div class="sp-slides">

        <div class="b-main-slider__slide b-main-slider__slide-1 sp-slide"><img class="sp-image" src="/images/banners/homepage1.jpg" alt="slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sp-layer" data-width="100%" data-show-transition="left" data-hide-transition="left"
                            data-show-duration="800" data-show-delay="400" data-hide-delay="400">
                            <div class="b-main-slider__title-wrap">
                                <div class="b-main-slider__slogan">Your <span style="color:gold">No.1</span> Online</div>
                                <div class="b-main-slider__title">Boating Solution</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-main-slider__slide b-main-slider__slide-1 sp-slide"><img class="sp-image" src="/images/banners/homepage2.jpg" alt="slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sp-layer" data-width="100%" data-show-transition="left" data-hide-transition="left"
                            data-show-duration="800" data-show-delay="400" data-hide-delay="400">
                            <div class="b-main-slider__title-wrap">
                                <div class="b-main-slider__slogan">Your <span style="color:gold">No.1</span> Online</div>
                                <div class="b-main-slider__title">Boating Solution</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
    <!-- end .b-main-slider-->
    <div class="b-about">
        <div class="ui-decor ui-decor_down"></div>
        <div class="container">
            <div class="b-main-filter-content tab-content" id="findTabContent">
                <form action="/showroom" method="GET">
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
                                                @foreach (__('global.price_range') as $k=>$v )
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endforeach
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
                        <h2 class="ui-title">Providing an extensive range of boats suitable for your every need!</h2>
                        <div class="ui-content">
                            <p>Boat Centre - Established in 1998 , was borne with the passion of boating and fishing by the
                                owner and CEO Shandon Hawman.
                                <br>With the introduction of online technology and the advancing internet services,
                                <br>Boat Centre plunged into the online marketing and boating sales, creating the first South African boating website.
                                <br>Boat Centre became renowned as - <strong>Your</strong><span
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
                                <div class="b-reviews__text">What an Awesome Experience. Shandon handled everything from sifting through tire kickers and ridiculous offers till he found the right buyer. I had no issues with banks, financing or couriering the boat to new owner. You want to sell a boat a boat you love, do it with Bass Boats South Africa. Hassel free, Send paperwork, Pics and Video of boat and he does the rest. Money in the bank!  Very Happy. Well-done Shandon and team.</div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Ian Versfeld</div>
                                    <div class="b-reviews__category">2021-03-10</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                            <blockquote class="b-reviews">
                                <div class="b-reviews__text">excellant advice and the best service all round? thanks Shandon</div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Donnathin De Beer</div>
                                    <div class="b-reviews__category">2021-02-02</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                            <blockquote class="b-reviews">
                                <div class="b-reviews__text">Shandon sold my boat and got me into new boat in 48 hours. got my price and he negotiated me a great deal on my new boat. super impressed and I recommend him to anyone wanting a boat or selling 1. again Shandon thanks so much</div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Gary Peter</div>
                                    <div class="b-reviews__category">2019-04-04</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                            <blockquote class="b-reviews">
                                <div class="b-reviews__text">Shandon got a good deal for me. With great friendly service! I suggest using him and his recources and contacts!</div>
                                <div class="b-reviews__footer">
                                    <div class="b-reviews__name">Gary Dean Boyder</div>
                                    <div class="b-reviews__category">2018-09-27</div>
                                </div>
                            </blockquote>
                            <!-- end .b-reviews-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--
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
    </section> --}}
    <section class="section-default section-banners">
        <div class="container">
            <div class="text-center"> <img src="/images/banners.jpg" alt="photo"> </div>
        </div>
    </section>

@endsection
