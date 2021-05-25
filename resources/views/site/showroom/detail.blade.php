@extends('layouts.site')
@section('title', 'Detail')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">Golden Odyssey</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/showroom">Showroom</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
          </ol>
        </nav>
        <!-- end .breadcrumb-->

      </div>
    </div>
  </div>
  <!-- end .b-title-page-->
  <div class="l-main-content">
    <div class="ui-decor ui-decor_sm-h ui-decor_mirror bg-primary"></div>
    <div class="container">
      <section class="b-goods-f">
        <div class="row">
          <div class="col-lg-8">


            <div class="b-goods-f__slider">
              <div class="ui-slider-main js-slider-for">
                 <img class="img-scale" src="/images/b001.jpg" alt="photo">
                  <img class="img-scale" src="/images/2.jpg" alt="photo">
                  <img class="img-scale" src="/images/3.jpg" alt="photo">
                  <img class="img-scale" src="/images/4.jpg" alt="photo">
                  <img class="img-scale" src="/images/5.jpg" alt="photo">
                  <img class="img-scale" src="/images/6.jpg" alt="photo">
                </div>
              <div class="ui-slider-nav js-slider-nav">
                  <img class="img-scale" src="/images/b001.jpg" alt="photo">
                  <img class="img-scale" src="/images/2.jpg" alt="photo">
                  <img class="img-scale" src="/images/3.jpg" alt="photo">
                  <img class="img-scale" src="/images/4.jpg" alt="photo">
                  <img class="img-scale" src="/images/5.jpg" alt="photo">
                  <img class="img-scale" src="/images/6.jpg" alt="photo">
                </div>
            </div>



                 <h2 class="b-goods-f__title">Boat Specifications</h2>
            <div class="row">


                <div class="col-md-4">

                  <dl class="data-list-descriptions">
                                    <!-- Make -->
                <div class="dd-item">
                    <dt>Make:</dt>
                    <dd>Celebrations</dd>
                    </div>

                <div class="dd-item">
                    <dt class="left">Engine Model:</dt>
                    <dd class="right">C32A</dd>
                </div>

                <div class="dd-item">
                    <dt class="left">Length:</dt>
                    <dd class="right">110 ft</dd>
                </div>

                <div class="dd-item">
                    <dt class="left">Gross Weight:</dt>
                    <dd class="right">278,000 lb</dd>
                </div>



                </dl>

            </div>


                <div class="col-md-4">

                  <dl class="data-list-descriptions">
                                    <!-- Make -->


                <div class="dd-item">
                    <dt class="left">Hull Material:</dt>
                    <dd class="right">Fiberglass</dd>
                </div>

                <div class="dd-item">
                    <dt class="left">Draft:</dt>
                    <dd class="right">5.92 ft</dd>
                </div>

                <div class="dd-item">
                    <dt class="left">Fuel Capacity:</dt>
                    <dd class="right">6150 Gallons</dd>
                </div>

                <div class="dd-item">
                    <dt class="left">Fuel Type:</dt>
                    <dd class="right">Diesel</dd>
                </div>
                        </dl>




            </div>



                <div class="col-md-4">

                  <dl class="data-list-descriptions">
                                    <!-- Make -->
                <div class="dd-item">
                    <dt class="left">Manufacturer:</dt>
                    <dd class="right">Caterpillar</dd>
                </div>


                      <div class="dd-item">
                    <dt class="left">Max Speed:</dt>
                    <dd class="right">120</dd>
                </div>

                <div class="dd-item">
                    <dt class="left">Passengers:</dt>
                    <dd class="right">12</dd>
                </div>

                      <div class="dd-item">
                    <dt class="left">Master Bedroom:</dt>
                    <dd class="right">3</dd>
                </div>


                  </dl>
            </div>



                  </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item"><a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a></li>
              <li class="nav-item"><a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="false">Features & Services</a></li>
              <li class="nav-item"><a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Boats Location</a></li>
              <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <p>Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ullam laboris nisi ut aliquip laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                   <h3 class="b-goods-f__title-inner">Highlights of the new services </h3>
                <p><strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</strong> nisi ut aliquip ex ea commodo cons equat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Exe pteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed umt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>

              </div>
              <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">



                <ul class="list list-mark-2 list-ervices">
                  <li>Enim ipsum ad minim veniams quis</li>
                  <li>Consectetur adipisicing elit</li>
                  <li>Ut enim ad minim veniam quis</li>
                  <li>Laboris nisi ut aliquip ex e comodo </li>
                  <li>Reprehenderit in voluptate velit esse </li>
                     <li>Enim ipsum ad minim veniams quis</li>
                  <li>Consectetur adipisicing elit</li>
                  <li>Ut enim ad minim veniam quis</li>
                  <li>Laboris nisi ut aliquip ex e comodo </li>
                  <li>Reprehenderit in voluptate velit esse </li>
                     <li>Enim ipsum ad minim veniams quis</li>
                  <li>Consectetur adipisicing elit</li>
                  <li>Ut enim ad minim veniam quis</li>
                  <li>Laboris nisi ut aliquip ex e comodo </li>

                </ul>



              </div>
              <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons equat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                      <div class="map" id="map"></div>


              </div>
              <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">




                  <ul class="comments-list list-unstyled">
                    <li>
                      <article class="comment b-goods-reviews__comment clearfix">
                        <header class="comment-header clearfix">
                          <div class="pull-left">
                            <cite class="comment-author">Johannes Kepler</cite>
                            <time datetime="20219-10-27" class="comment-datetime">24 Sep 2019</time>
                          </div>
                          <ul class="rating-list list-inline pull-right">
                             <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star "></li>
                          </ul>
                        </header>
                        <div class="comment-body">
                          <p>Duis ante magna, aliquet sit amet sagittis vitae, tristique at lacus. Ut et accumsan turpis. Phasellus ornare, tortor ut congue imperdiet, mauris magna condimentum nulla, non malesuada mauris massa eu augue.</p>
                        </div>
                      </article>
                    </li>
                    <li>
                      <article class="comment b-goods-reviews__comment clearfix">
                        <header class="comment-header clearfix">
                          <div class="pull-left">
                            <cite class="comment-author">Ruben Chapman</cite>
                            <time datetime="2019-10-27" class="comment-datetime">19 Dec 2019</time>
                          </div>
                          <ul class="rating-list list-inline pull-right">
                            <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star color-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                          </ul>
                        </header>
                        <div class="comment-body">
                          <p>Proin non ultricies mauris, non varius massa. Maecenas tempus risus ut erat blandit fermentum. Praesent commodo quam non lacus interdum semper et ut enim. Donec vel suscipit nulla. Nullam imperdiet nisl in lectus porta sodales. Curabitur consequat dui nec eleifend tempor. Pellentesque elementum blandit interdum.</p>
                        </div>
                      </article>
                    </li>
                  </ul>



              </div>
            </div>




          </div>
          <div class="col-lg-4">
            <aside class="l-sidebar">
              <div class="b-goods-f-price">
                <div class="b-goods-f-price__header bg-secondary"><span class="b-goods-f-price__main">R 1 230 000</span></div>

              </div>
              {{-- <div class="b-goods__wrap-bnrs">

                  <img class="b-goods__bnr" src="/images/payment-icon_02.png" alt="photo">

                   <div class="b-goods-f-price__note">Included Taxes & Checkup*</div>

                </div> --}}




              <div class="b-seller">
                <div class="b-seller__header bg-primary">
                  <div class="b-seller__img"><img class="img-scale" src="/images/yteam001.jpg" alt="foto"></div>
                  <div class="b-seller__title">
                    <div class="b-seller__name">James William</div>
                    <div class="b-seller__category">Member Since April 2013</div>
                  </div>
                </div>
                <div class="b-seller__main"><i class="b-seller__ic flaticon-phone-call text-primary"></i>
                  <div class="b-seller__contact"><span class="d-block">Contact Seller</span><a class="b-seller__phone" href="tel:12584037961">1 (258) 403 7961</a></div>
                  <ul class="b-seller-soc list-unstyled">
                    <li class="b-seller-soc__item"><a class="b-seller-soc__link" href="#" target="_blank"><i class="ic fab fa-facebook-f"></i></a></li>
                    {{-- <li class="b-seller-soc__item"><a class="b-seller-soc__link" href="#" target="_blank"><i class="ic fab fa-linkedin-in"></i></a></li> --}}
                    <li class="b-seller-soc__item"><a class="b-seller-soc__link" href="#" target="_blank"><i class="ic fab fa-twitter"></i></a></li>
                    {{-- <li class="b-seller-soc__item"><a class="b-seller-soc__link" href="#" target="_blank"><i class="ic fab fa-behance"></i></a></li> --}}
                    <li class="b-seller-soc__item"><a class="b-seller-soc__link" href="#" target="_blank"><i class="ic fab fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
              <!-- end .b-seller-->

              <div class="widget-2 section-sidebar bg-gray">
                <h3 class="widget-title-2"><span class="widget-title__inner">Message Seller</span></h3>
                <div class="widget-content">
                  <div class="widget-inner">
                    <form>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" placeholder="Message" rows="5"></textarea>
                      </div>
                      <button class="btn btn-secondary w-100">send message now</button>
                    </form>
                  </div>
                </div>
              </div>

            </aside>
          </div>
        </div>
      </section>
      <!-- end .b-goods-f-->

    </div>
  </div>


@endsection
