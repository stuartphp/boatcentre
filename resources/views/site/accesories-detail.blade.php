@extends('layouts.site')
@section('content')
<div class="section-title-page accesories area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">Accesories</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/accesories">Accesories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
                </ol>
            </nav>
            <!-- end .breadcrumb-->
        </div>
    </div>
</div>
<div class="container">
    <section class="b-goods-f">
        <div class="row">
            <div class="col-md-6"><img src="/images/stock/{{ ($data->image>'') ? $data->image : 'no_image.jpg' }}" style="max-width: 400px;"></div>
            <div class="col-md-6 mt-5"><h5>{{ $data->name}}</h5>
            <p>{{ $data->description }}</p>
            <div class="b-goods__price text-primary"><span class="b-goods__price-number">R {{ number_format($data->retail_price,2) }}</div>
            </div>
        </div>
    </section>
</div>
@endsection
