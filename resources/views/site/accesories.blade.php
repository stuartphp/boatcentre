@extends('layouts.site')
@section('content')
<div class="section-title-page accesories area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">Accesories</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Accesories</li>
                </ol>
            </nav>
            <!-- end .breadcrumb-->
        </div>
    </div>
</div>
<div class="container">
    <div class="section-goods__list">
        <div class="row">
            @foreach ($data as $item )
            <div class="col-xl-3 col-md-6">
                <div class="b-goods">
                    <a class="b-goods__img" href="/accesories/detail/{{ $item->id }}"><img class="img-scale" src="/images/stock/{{ ($item->image>'') ? $item->image : 'no_image.jpg' }}" alt="photo"></a>
                    <div class="b-goods__main">
                        <div class="col-12"><a class="b-goods__title" href="/accesories/detail/{{ $item->id }}">{{ $item->name }}</a>
                                <div class="b-goods__info">{{ $item->name }}</div>
                            </div>
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <div class="b-goods__price text-primary"><span class="b-goods__price-number">R {{ number_format($item->retail_price,2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        <div class="text-center mt-3">{{ $data->links() }}</div>
    </div>
</div></div>
@endsection
