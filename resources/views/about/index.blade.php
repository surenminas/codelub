@extends('layouts.main')

@section('title')
    {{ 'About' }}
@endsection

@section('content')
    <div class="mb-5">
        <h1 class="mt-4 text-center" data-aos="fade-up">About</h1>
        <section class="edica-landing-section edica-landing-about">

            <div class="row">
                <div class="col-lg-8 aos-init aos-animate" data-aos="fade-up-right">
                    <h4 class="edica-landing-section-subtitle-alt">ABOUT US</h4>
                    <p>Welcome to <b>CodeLub</b>, a blog dedicated to providing valuable and informative content about web
                        development technologies such as HTML, CSS, JavaScript, and PHP. As a self-taught web developer
                        from Armenia, I understand the importance of having access to quality resources to improve your
                        coding skills.
                    </p>

                    <p>Here on <b>CodeLub</b>, you’ll find in-depth blog posts tutorials that cover various coding topics,
                        including useful coding projects and source codes that you can use for free. My goal is to
                        empower others to learn and excel in the world of web development, which is why I make all my
                        content available to anyone who wants to learn.
                    </p>

                    <p>If you have any questions or would like to contact me, please visit the contact page.</p>

                    <p> I hope you find my content informative and helpful, and I look forward to helping you on your
                        coding journey.
                    </p>
                </div>
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up-left">
                    <iframe
                        src="https://maps.google.com/maps?q=yerevan&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                        class="w-100 h-100"></iframe>
                </div>
            </div>
        </section>
    </div>
    </main>
@endsection
