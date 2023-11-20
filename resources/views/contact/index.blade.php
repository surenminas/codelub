@extends('layouts.main')

@section('title')
    {{ 'Contact' }}
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">Contact</h1>
                    <section class="edica-contact py-5 mb-5">
                        <div class="row">
                            <div class="col-md-8 contact-form-wrapper">
                                <h5 data-aos="fade-up">Contact form</h5>

                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif

                                {{-- @if (Session::has('failed'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('failed') }}
                                        @php
                                            Session::forget('failed');
                                        @endphp
                                    </div>
                                @endif  --}}


                                @error('failed')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <form action="{{ route('contact.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="name">NAME</label>
                                            <input type="text" class="form-control" id="name" name="contact_name"
                                                value="{{ old('contact_name') }}" placeholder="Your full name">
                                            @error('contact_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="100">
                                            <label for="email">EMAIL</label>
                                            <input type="email" class="form-control" id="email" name="contact_email"
                                                value="{{ old('contact_email') }}" placeholder="Email address">
                                            @error('contact_email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
                                            <label for="message">MESSAGE</label>
                                            <textarea name="contact_message" id="message" rows="9" class="form-control" placeholder="Your Text">{{ old('contact_message') }}</textarea>
                                            @error('contact_message')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up"
                                        data-aos-delay="300">Send Message</button>
                                </form>

                            </div>
                            <div class="col-md-4 contact-sidebar" data-aos="fade-left">
                                <h5>Contact us</h5>
                                <p>Need assistance? Our customer service is here to assist you Monday through Friday from 9
                                    am EST to 10 pm EST.</p>
                                <p>Armenia, Yerevan<br> Center, AM 001 </p>
                                <div class="embed-responsive embed-responsive-1by1 contact-map">
                                    <iframe src="https://maps.google.com/maps?q=yerevan&t=&z=14&ie=UTF8&iwloc=&output=embed"
                                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                        aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
