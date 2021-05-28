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
        <div class="row">
            <div class="col-xl-12 mb-3">
                <div class="row" style="padding:5px 10px; border: 1px #ccc solid; background-color:#ccc; border-radius:5px">
                    <div class="col"><select class="selectpicker" data-width="100%" data-live-search="true" data-style="ui-select">
                        <option value="" selected>Category</option>
                    @foreach ($categories as $cat )
                        @if ($cat->parent_id == 0)
                        <optgroup label="{{ $cat->name }}">
                            @foreach ($categories as $child )
                                @if ($child->parent_id == $cat->id)
                                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        @endif
                    @endforeach
                    </select></div>
                    <div class="col">
                        <select class="selectpicker" data-live-search="true" data-width="100%" data-style="ui-select">
                            <option value="" selected>Manufacturer</option>
                            @foreach ($manufacturers as $k=>$v)
                            <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select class="selectpicker" data-live-search="true" data-width="100%" data-style="ui-select">
                            <option value="" selected>Price Range</option>
                            @foreach (__('global.price_range') as $k=>$v)
                            <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col text-right"><button class="b-main-filter__btn btn btn-secondary" type="submit">Search</button></div>
                </div>
            </div>
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
            {{ $boats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>

</script>
@endsection
