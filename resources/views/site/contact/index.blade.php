@extends('layouts.site')
@section('content')

<div class="page-heading-wapper banner">
    <div class="container">
        <h1 class="page-heading">GET IN TOUCH</h1>
    </div>
</div>
<div class="page-content main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main-content">
                <div class="contact-form">
                    <div id="message-box-conact"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><input id="name" class="input-text" type="text" placeholder="YOUR NAME*"></p>
                        </div>
                        <div class="col-sm-6">
                            <p><input id="email" class="input-text" type="text" placeholder="YOUR EMAIL*"></p>
                        </div>

                    </div>
                    <p>
                        <textarea id="content" class="input-text" rows="8" placeholder="YOUR MESSAGE*"></textarea>
                    </p>
                    <button id="btn-send-contact" class="button">SEND</button>
                </div>
                <div class="margin-top-80">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="margin-top-30">ADDRESS</h4>
                            <p>200 West Broadway New York, NY, United States   </p>
                        </div>
                        <div class="col-sm-3">
                            <h4 class="margin-top-30">EMAIL</h4>
                            <p>info@store.com</p>
                        </div>
                        <div class="col-sm-3">
                            <h4 class="margin-top-30">STORE HOURS</h4>
                            <p>Monday-Saturday / 10 am to 8 pm <br> Sunday /  CLOSED</p>
                        </div>
                        <div class="col-sm-3">
                            <h4 class="margin-top-30">SOCIAL</h4>
                            <div class="block-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
