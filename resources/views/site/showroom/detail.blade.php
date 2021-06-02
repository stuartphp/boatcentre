@extends('layouts.site')
@section('title', 'Detail')
@section('content')
<div class="section-title-page detail area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">{{ $boat->name }}</h1>
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
            @if($boat->is_sold==1) <h4 style="color: #ff0000">SOLD</h4> @endif
            <div class="row">
                <div class="col-lg-8">
                    <div class="b-goods-f__slider">
                        <div class="ui-slider-main js-slider-for">
                            @foreach ($boat->images as $img)
                            <img class="img-scale" src="/images/boats/{{ $img->image }}" alt="photo">
                            @endforeach
                        </div>
                        <div class="ui-slider-nav js-slider-nav">
                            @foreach ($boat->images as $img)
                            <img class="img-scale" src="/images/boats/{{ $img->image }}" height="90px" alt="photo">
                            @endforeach
                        </div>
                    </div>
                    <h2 class="b-goods-f__title">Boat Specifications @if ($boat->year_of_manufacture > 0)
                    ({{ $boat->year_of_manufacture }})
                    @endif</h2>
                    <div class="row">
                                <div class="col-md-4">
                                    <dl class="data-list-descriptions">
                                        <div class="dd-item">
                                            <dt class="left">Manufacturer:</dt>
                                            <dd class="right">{{ $boat->manufacturer->name }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left" title="Length overal">LOA:</dt>
                                            <dd class="right">&nbsp;{{ $boat->loa }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left" title="Greatest width of boat">Beam:</dt>
                                            <dd class="right">&nbsp;{{ $boat->beam }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left" title="Depth of water the boat draws">Draft:</dt>
                                            <dd class="right">&nbsp;{{ $boat->draft }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">New/Used:</dt>
                                            <dd class="right">{{ ($boat->new_used==0) ? 'Used' : 'New'}}</dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="col-md-4">
                                    <dl class="data-list-descriptions">
                                        <div class="dd-item">
                                            <dt>Make:</dt>
                                            <dd>{{ $boat->model->model }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Weight:</dt>
                                            <dd class="right">&nbsp;{{ $boat->weight }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Fuel Capacity:</dt>
                                            <dd class="right">&nbsp;{{ $boat->fuel_tank }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Fuel Type:</dt>
                                            <dd class="right">{{ __('global.fuel_type.'.$boat->fuel_type)}}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Main Color:</dt>
                                            <dd class="right">
                                                <div style="border: 1px #000 solid; background-color:{{  $boat->main_color  }}; width:100px; float:right">&nbsp;</div></dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="col-md-4">
                                    <dl class="data-list-descriptions">
                                        <div class="dd-item">
                                            <dt class="left">Hull Material:</dt>
                                            <dd class="right">{{ $boat-> hull_construction }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Max Speed:</dt>
                                            <dd class="right">&nbsp;{{ $boat->max_speed }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Passengers:</dt>
                                            <dd class="right">&nbsp;{{ $boat->passengers }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Crew:</dt>
                                            <dd class="right">&nbsp;{{ $boat->crew }}</dd>
                                        </div>
                                        <div class="dd-item">
                                            <dt class="left">Condition:</dt>
                                            <dd class="right">{{ __('global.condition.'.$boat->condition) }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a></li>
                        <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Additional</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            {!! $boat->description !!}
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                            @foreach ($boat->additionals as $additional )
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6"><b>{{ $additional->name }}</b></div>
                                        <div class="col-6">{{ $additional->value }}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="l-sidebar">
                        <div class="b-goods-f-price">
                            <div class="b-goods-f-price__header bg-secondary">
                                <span class="b-goods-f-price__main" @if($boat->is_sold==1) style="text-decoration: line-through" @endif>R {{ number_format($boat->retail_price,2) }}</span>
                            </div>
                        </div>
                        {{-- <div class="b-goods__wrap-bnrs">

                  <img class="b-goods__bnr" src="/images/payment-icon_02.png" alt="photo">

                   <div class="b-goods-f-price__note">Included Taxes & Checkup*</div>

                </div> --}}
                        <div class="b-seller">
                            <div class="b-seller__header bg-primary">
                                <!-- <div class="b-seller__img">
                                    @if ($boat->dealer->logo > '')
                                        <img class="img-scale" src="/images/logos/{{ $boat->dealer->logo }}" alt="foto">
                                    @endif
                                </div> -->
                                <div class="b-seller__title">
                                    <div class="b-seller__name">{{ $boat->dealer->trading_name }}</div>
                                    <div class="b-seller__category">Member Since {{ date('M Y',strtotime($boat->dealer->created_at)) }}</div>
                                </div>
                            </div>
                            <div class="b-seller__main"><i class="b-seller__ic flaticon-phone-call text-primary"></i>
                                <div class="b-seller__contact">
                                    <span class="d-block">Contact Seller</span>
                                    <a class="b-seller__phone" href="tel:{{ $boat->dealer->mobile }}">{{ $boat->dealer->contact_person }}<br>{{ $boat->dealer->mobile }}</a>
                                </div>
                                <ul class="b-seller-soc list-unstyled">
                                    @if ($boat->fb_link > '')
                                    <li class="b-seller-soc__item">
                                        <a class="b-seller-soc__link" href="{{ $boat->fb_link }}" target="_blank">
                                            <i class="ic fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    @endif

                                    <!-- <li class="b-seller-soc__item">
                                        <a class="b-seller-soc__link" href="#" target="_blank">
                                            <i class="ic fab fa-twitter"></i>
                                        </a>
                                    </li> -->
                                    @if ($boat->youtube_link)
                                    <li class="b-seller-soc__item">
                                        <a class="b-seller-soc__link" href="{{ $boat->youtube_link }}" target="_blank">
                                            <i class="ic fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    @endif

                                    <!-- <li class="b-seller-soc__item">
                                        <a class="b-seller-soc__link" href="#" target="_blank">
                                            <i class="ic fab fa-instagram"></i>
                                        </a>
                                    </li> -->
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
