@extends('layouts.site')
@section('title', 'Showroom')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
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
<div class="col-xl-3">
  <aside class="l-sidebar l-sidebar_top_minus">
    <div class="widget section-sidebar bg-gray">
      <h3 class="widget-title row justify-content-between align-items-center no-gutters"><span class="widget-title__inner col">Search Options</span><i class="ic flaticon-car-repair col-auto"></i></h3>
      <div class="widget-content">
        <div class="widget-inner">
          <form class="b-filter">
            <div class="b-filter__main row">
              <div class="b-filter__row col-xl-12 col-md-6">
                <select class="selectpicker" data-width="100%" title="Select Make" multiple="multiple" data-max-options="1" data-style="ui-select">
                  <option>Select 1</option>
                  <option>Select 2</option>
                  <option>Select 3</option>
                  <option>Select 4</option>
                </select>
              </div>
              <div class="b-filter__row col-xl-12 col-md-6">
                <select class="selectpicker" data-width="100%" title="Select Model" multiple="multiple" data-max-options="1" data-style="ui-select">
                  <option>Select 1</option>
                  <option>Select 2</option>
                  <option>Select 3</option>
                  <option>Select 4</option>
                </select>
              </div>
              <div class="b-filter__row col-xl-12 col-md-6">
                <select class="selectpicker" data-width="100%" title="Boats Type" multiple="multiple" data-max-options="1" data-style="ui-select">
                  <option>Select 1</option>
                  <option>Select 2</option>
                  <option>Select 3</option>
                  <option>Select 4</option>
                </select>
              </div>
              <div class="b-filter__row col-xl-12 col-md-6">
                <select class="selectpicker" data-width="100%" title="Condition" multiple="multiple" data-max-options="1" data-style="ui-select">
                  <option>Select 1</option>
                  <option>Select 2</option>
                  <option>Select 3</option>
                  <option>Select 4</option>
                </select>
              </div>
              <div class="col-12">
                <div class="b-filter__row row">
                  <div class="b-filter__item col-md-6">
                    <select class="selectpicker" data-width="100%" title="From" multiple="multiple" data-max-options="1" data-style="ui-select">
                      <option>Select 1</option>
                      <option>Select 2</option>
                      <option>Select 3</option>
                      <option>Select 4</option>
                    </select>
                  </div>
                  <div class="b-filter__item col-md-6">
                    <select class="selectpicker" data-width="100%" title="To" multiple="multiple" data-max-options="1" data-style="ui-select">
                      <option>Select 1</option>
                      <option>Select 2</option>
                      <option>Select 3</option>
                      <option>Select 4</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="b-filter__row col-xl-12 col-md-6">
                <select class="selectpicker" data-width="100%" title="Fuel Type" multiple="multiple" data-max-options="1" data-style="ui-select">
                  <option>Select 1</option>
                  <option>Select 2</option>
                  <option>Select 3</option>
                  <option>Select 4</option>
                </select>
              </div>
            </div>
            {{-- <div class="b-filter-slider ui-filter-slider">
              <div class="b-filter-slider__title">Price</div>
              <div class="b-filter-slider__main">
                <div id="filterPrice"></div>
                <div class="b-filter__row row">
                  <div class="b-filter__item col-md-6">
                    <input class="ui-select" id="input-with-keypress-0"/>
                  </div>
                  <div class="b-filter__item col-md-6">
                    <input class="ui-select" id="input-with-keypress-1"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="b-filter-slider ui-filter-slider">
              <div class="b-filter-slider__title">Search radius</div>
              <div class="b-filter-slider__main">
                <div id="sliderRange"></div>
                <div class="b-filter__row">
                  <input class="ui-select" id="input-range"/>
                </div>
              </div>
            </div>--}}
            <button class="b-filter__reset btn btn-secondary w-100" type="reset">reset filters</button>
          </form>
        </div>
      </div>
    </div>
    <!-- end .b-filter-->

  </aside>
</div>


<div class="col-xl-9">


       <div class="b-goods-group-2 row">


  <div class="col-xl-4 col-md-6">
  <div class="b-goods-flip">

    <div class="flip-container">
      <div class="flipper">
        <div class="flip__front">
          <div class="b-goods-flip__img"><img class="img-scale" src="/images/b001.jpg" alt="photo"/></div>
          <div class="b-goods-flip__main">
            <div class="b-goods-flip__header row no-gutters align-items-center">
              <div class="col"><a class="b-goods-flip__title" href="#">GOLDEN ODYSSEY</a></div>
              <div class="col-auto">
                <div class="b-goods-flip__price text-primary">R 980 000</div>
              </div>
            </div>
              <div class="b-goods-descrip_nev_wrap">
                    <div class="b-ex-info">Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ...</div>
                    <a class="btn btn-default w-100" href="/showroom/detail">READ MORE</a>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>   <!-- end .b-goods-->

  <div class="col-xl-4 col-md-6">
  <div class="b-goods-flip">

    <div class="flip-container">
      <div class="flipper">
        <div class="flip__front">
          <div class="b-goods-flip__img"><img class="img-scale" src="/images/b002.jpg" alt="photo"/></div>
          <div class="b-goods-flip__main">
            <div class="b-goods-flip__header row no-gutters align-items-center">
              <div class="col"><a class="b-goods-flip__title" href="#">Black pearl</a></div>
              <div class="col-auto">
                <div class="b-goods-flip__price text-primary">R 650 000</div>
              </div>
            </div>
              <div class="b-goods-descrip_nev_wrap">
                    <div class="b-ex-info">Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ...</div>
                    <a class="btn btn-default w-100" href="/showroom/detail">READ MORE</a>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>   <!-- end .b-goods-->




  <div class="col-xl-4 col-md-6">
  <div class="b-goods-flip">

    <div class="flip-container">
      <div class="flipper">
        <div class="flip__front">
          <div class="b-goods-flip__img"><img class="img-scale" src="/images/b003.jpg" alt="photo"/></div>
          <div class="b-goods-flip__main">
            <div class="b-goods-flip__header row no-gutters align-items-center">
              <div class="col"><a class="b-goods-flip__title" href="#">Sea Senora</a></div>
              <div class="col-auto">
                <div class="b-goods-flip__price text-primary">R 430 00</div>
              </div>
            </div>
              <div class="b-goods-descrip_nev_wrap">
                    <div class="b-ex-info">Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ...</div>
                    <a class="btn btn-default w-100" href="/showroom/detail">READ MORE</a>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>   <!-- end .b-goods-->



</div>

<div class="b-goods-group-2 row">




  <div class="col-xl-4 col-md-6">
  <div class="b-goods-flip">

    <div class="flip-container">
      <div class="flipper">
        <div class="flip__front">
          <div class="b-goods-flip__img"><img class="img-scale" src="/images/b004.jpg" alt="photo"/></div>
          <div class="b-goods-flip__main">
            <div class="b-goods-flip__header row no-gutters align-items-center">
              <div class="col"><a class="b-goods-flip__title" href="#">Fish Tales</a></div>
              <div class="col-auto">
                <div class="b-goods-flip__price text-primary">$110 <span>/ per day</span></div>
              </div>
            </div>
              <div class="b-goods-descrip_nev_wrap">
                    <div class="b-ex-info">Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ...</div>
                    <a class="btn btn-default w-100" href="/showroom/detail">READ MORE</a>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>   <!-- end .b-goods-->




  <div class="col-xl-4 col-md-6">
  <div class="b-goods-flip">

    <div class="flip-container">
      <div class="flipper">
        <div class="flip__front">
          <div class="b-goods-flip__img"><img class="img-scale" src="/images/b005.jpg" alt="photo"/></div>
          <div class="b-goods-flip__main">
            <div class="b-goods-flip__header row no-gutters align-items-center">
              <div class="col"><a class="b-goods-flip__title" href="#">Island Time</a></div>
              <div class="col-auto">
                <div class="b-goods-flip__price text-primary">$310 <span>/ per day</span></div>
              </div>
            </div>
              <div class="b-goods-descrip_nev_wrap">
                    <div class="b-ex-info">Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ...</div>
                    <a class="btn btn-default w-100" href="/showroom/detail">READ MORE</a>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>   <!-- end .b-goods-->



  <div class="col-xl-4 col-md-6">
  <div class="b-goods-flip">

    <div class="flip-container">
      <div class="flipper">
        <div class="flip__front">
          <div class="b-goods-flip__img"><img class="img-scale" src="/images/b006.jpg" alt="photo"/></div>
          <div class="b-goods-flip__main">
            <div class="b-goods-flip__header row no-gutters align-items-center">
              <div class="col"><a class="b-goods-flip__title" href="#">Fast Serenity</a></div>
              <div class="col-auto">
                <div class="b-goods-flip__price text-primary">$210 <span>/ per day</span></div>
              </div>
            </div>
              <div class="b-goods-descrip_nev_wrap">
                    <div class="b-ex-info">Edipisicing eiusmod tempor incididunt labore sed dolore magna aliqa enim ipsum ad minim veniams quis nostrud citation ...</div>
                    <a class="btn btn-default w-100" href="/showroom/detail">READ MORE</a>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>   <!-- end .b-goods-->




</div>

<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item active"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
</ul>
</nav>



</div>
</div>



</div>




</div>



@endsection
