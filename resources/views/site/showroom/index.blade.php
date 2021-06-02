@extends('layouts.site')
@section('title', 'Showroom')
@section('content')
<div class="section-title-page showroom area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">Showroom</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Showroom</li>
                </ol>
            </nav>
            <!-- end .breadcrumb-->

        </div>
    </div>
</div>

<div class="l-main-content">
    <div class="ui-decor ui-decor_mirror ui-decor_sm-h bg-primary"></div>
    <div class="container">
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
                                                    <option value="1" @if($condition==1) selected @endif>New</option>
                                                    <option value="0" @if($condition==0) selected @endif>Used</option>
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
                                                        <option value="{{ $k }}" @if ($k==$price) selected  @endif>{{ $v }}</option>
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

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="b-goods-group-2 row">
                    @foreach ($boats as $boat)
                        <div class="col-xl-4 col-md-6">
                            <div class="b-goods-flip">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="flip__front">
                                            <div class="b-goods-flip__img">
                                                @if (isset($boat->images[0]->image))
                                                    <img class="img-scale" src="/images/boats/{{ $boat->images[0]->image }}" alt="photo" />
                                                    @if($boat->is_sold==1)<div class="shop-label" style="background-color: #f80303; color: #fff">SOLD</div>@endif
                                                    @else
                                                    <img class="img-scale" src="/images/boats/placeholder.png" alt="photo" />
                                                @endif
                                            </div>
                                            <div class="b-goods-flip__main">
                                                <div class="b-goods-flip__header row no-gutters align-items-center">
                                                    <div class="col"><a class="b-goods-flip__title" href="/showroom/detail/{{ $boat->id }}">{{ $boat->name }}</a></div>
                                                    <div class="col-auto">
                                                        <div class="b-goods-flip__price text-primary">R {{ number_format($boat->retail_price,2) }}</div>
                                                    </div>
                                                </div>
                                                <div class="b-goods-descrip_nev_wrap">
                                                    <div class="b-ex-info">{{ $boat->short_description }}</div>
                                                    <a class="btn btn-default w-100" href="/showroom/detail/{{ $boat->id }}">READ MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>{{ $boats->appends(['condition'=>$condition, 'category'=>$category, 'price_range'=>$price])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>

</script>
@endsection
