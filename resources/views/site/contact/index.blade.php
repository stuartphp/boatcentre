@extends('layouts.site')
@section('title', 'Contact Us')
@section('content')

<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
        <div class="area-bg__inner">
          <div class="container text-center">
            <h1 class="b-title-page">CONTACT US</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="blog.html">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
              </ol>
            </nav>
            <!-- end .breadcrumb-->

          </div>
        </div>
      </div>
      <!-- end .b-title-page-->
   <div class="l-main-content">
        <div class="container">




            <div class="row">
              <div class="col-md-6">
                <div class="map" id="map">Map of your location</div>
              </div>
              <div class="col-md-6">
                <section class="section-form-contacts">
                  <h2 class="ui-title-inner">Send a Message</h2>
                  <p>Nulla pariatur excepteur sint occaecat cupidatat no proident culpa qui officia des mollit anim id est lab orum ut perspiciatis unde omnis iste natuser sit volupta tem accusantium sed ipsum laudantium.</p>
                  <div id="success"></div>
                  <form class="b-form-contacts ui-form" id="contactForm" action="#" method="post">
                    <div class="form-group">
                      <input class="form-control" id="user-name" type="text" name="user-name" placeholder="Your Name" required="required">
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="user-email" type="email" name="user-email" placeholder="email">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" id="user-message" rows="5" placeholder="Message" required="required"></textarea>
                    </div>
                    <button class="btn btn-primary">Send Message</button>
                  </form>
                </section>
                <!-- end .b-form-contact-->
              </div>
            </div>



        </div>
      </div>



@endsection
