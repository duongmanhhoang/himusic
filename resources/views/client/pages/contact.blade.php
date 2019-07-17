@extends('client.templates.non-slides')
@section('title'){{'Liên hệ'}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    <div class="section-spacing section-spacing-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 order-md-last">
                    <div class="contact-address">
                        <h6 class="title">Easy Contact</h6>
                        <ul>
                            <li>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h6>Email:</h6>
                                <p>info@yoursite.com </p>
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h6>+88 (016) 567.890.11</h6>
                                <p>Monday–Friday 9am-6pm</p>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h6>Address</h6>
                                <p>51 Somestreet Cambridge, CB4 3AA, United Kingdom</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 order-md-first">
                    <div class="google-map">
                        <div class="map-canvas"></div>
                    </div>
                </div>
            </div>

            <div class="row contact-form">
                <div class="col-lg-9 col-md-8">
                    <form action="http://html.unifytheme.com/dnce/inc/sendemail.php" class="form-validation" autocomplete="off">
                        <h5 class="title">Get In Touch With Us</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Your Name *" name="name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Your Email *" name="email">
                            </div>
                            <div class="col-12">
                                <input type="text" placeholder="Website url" name="web">
                            </div>
                        </div>
                        <textarea placeholder="Type your message" name="message"></textarea>
                        <button>Submit Request</button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="contact-meta-data">
                        <h6 class="title">Meta</h6>
                        <ul>
                            <li><a href="#">Log in</a></li>
                            <li><a href="#">Entries RSS</a></li>
                            <li><a href="#">Comments RSS</a></li>
                            <li><a href="#">WordPress.org</a></li>
                            <li><a href="#">Team</a></li>
                        </ul>
                    </div> <!-- /.contact-meta-data -->
                </div>
            </div>

            <!--Contact Form Validation Markup -->
            <!-- Contact alert -->
            <div class="alert-wrapper" id="alert-success">
                <div id="success">
                    <button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div class="wrapper">
                        <p>Your message was sent successfully.</p>
                    </div>
                </div>
            </div> <!-- End of .alert_wrapper -->
            <div class="alert-wrapper" id="alert-error">
                <div id="error">
                    <button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div class="wrapper">
                        <p>Sorry!Something Went Wrong.</p>
                    </div>
                </div>
            </div> <!-- End of .alert_wrapper -->
        </div>
    </div>
@endsection
