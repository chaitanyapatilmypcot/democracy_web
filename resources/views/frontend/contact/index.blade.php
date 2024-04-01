@extends('frontend/layouts/navd')
@section('content')
    <div class="bred_crumb">
        <div class="container">
            <!-- shape animation  -->
            <span class="banner_shape1"> <img src="{{ asset('frontend/images/banner-shape1.png') }}" alt="image"> </span>
            <span class="banner_shape2"> <img src="{{ asset('frontend/images/banner-shape2.png') }}" alt="image"> </span>
            <span class="banner_shape3"> <img src="{{ asset('frontend/images/banner-shape3.png') }}" alt="image"> </span>

            <div class="bred_text">
                <h1>Contact us</h1>
                <p>If you have an query, please get in touch with us, we will revert back quickly.</p>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><span>»</span></li>
                    <li><a href="contact_us">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Contact Us Section Start -->
    <section class="contact_page_section">
        <div class="container">
            <div class="contact_inner">
                <div class="contact_form">
                    <div class="section_title">
                        <h2>Leave a <span>message</span></h2>
                        <p>Fill up form below, our team will get back soon</p>
                    </div>
                    <form action="{{ route('contact') }}" method="post" id="contactForm">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Your message"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn puprple_btn" onclick="submitForm('contactForm','post');">SEND
                                MESSAGE</button>
                        </div>
                    </form>
                </div>
                <div class="contact_info">
                    <div class="icon"><img src="{{ asset('frontend/images/contact_message_icon.png') }}" alt="image">
                    </div>
                    <div class="section_title">
                        <h2>Have any <span>question?</span></h2>
                        <p>If you have any question about our product, service, payment or company, Visit our <a
                                href="faq">FAQs page.</a></p>
                    </div>
                    <a href="faq" class="btn puprple_btn">READ FAQ</a>
                    <ul class="contact_info_list">
                        <li>
                            <div class="img">
                                <img src="{{ asset('frontend/images/mail_icon.png') }}" alt="image">
                            </div>
                            <div class="text">
                                <span>Email Us</span>
                                <a href="mailto:{{ config('global.email') }}">{{ config('global.email') }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="img">
                                <img src="{{ asset('frontend/images/call_icon.png') }}" alt="image">
                            </div>
                            <div class="text">
                                <span>Call Us</span>
                                <a href="tel:{{ config('global.contact_no') }}">{{ config('global.contact_no') }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="img">
                                <img src="{{ asset('frontend/images/location_icon.png') }}" alt="image">
                            </div>
                            <div class="text">
                                <span>Visit Us</span>
                                <p>{{ config('global.company_address') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us Section End -->


    <!-- Map Section Start -->
    <section class="row_am map_section">
        <div class="container">
            <div class="map_inner">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799160891!2d-74.25987584510595!3d40.69767006338158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1664399300741!5m2!1sen!2sin"
                    width="100%" height="510" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Map Section End -->
@endsection
