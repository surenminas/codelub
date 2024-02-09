@extends('layouts.main')

@section('title')
    {{ 'Home' }}
@endsection

@section('content')
    <main>
        <section class="edica-landing-section edica-landing-blog">
            <div class="container">
                <h2 class="edica-landing-section-title" data-aos="fade-up">Most Popular Posts</h2>
                <div class="row">
                    @foreach ($mostPopularyPosts as $item)
                        <div class="col-md-4 landing-blog-post" data-aos="fade-right">
                            <div class="thumbnail_m">
                                <img src="{{ asset('storage/image/' . $item->image_preview) }}" alt="blog post"
                                    class="blog-post-thumbnail">
                            </div>
                            <div>
                                <p class="blog-post-category">{{ $item->category->title }}</p>
                                <h4 class="blog-post-title webkit-line-clamp">{{ $item->title }}</h4>
                                <a href="{{ route('post.show', $item->slug) }}" class="blog-post-link">Learn more</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="edica-landing-section edica-landing-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="fade-up-right">
                        <h4 class="edica-landing-section-subtitle-alt">ABOUT US</h4>
                        <p>Welcome to <b>CodeLub</b>, a blog dedicated to providing valuable and informative content about
                            web
                            development technologies such as HTML, CSS, JavaScript, and PHP. As a self-taught web developer
                            from Armenia, I understand the importance of having access to quality resources to improve your
                            coding skills.
                        </p>

                        <p>Here on <b>CodeLub</b>, you’ll find in-depth blog posts tutorials that cover various coding
                            topics,
                            including useful coding projects and source codes that you can use for free. My goal is to
                            empower others to learn and excel in the world of web development, which is why I make all my
                            content available to anyone who wants to learn.
                        </p>

                        <p>If you have any questions or would like to contact me, please visit the contact page.</p>

                        <p> I hope you find my content informative and helpful, and I look forward to helping you on your
                            coding journey.
                        </p>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up-left">
                        <iframe src="https://maps.google.com/maps?q=yerevan&t=&z=14&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                            class="w-100 h-100"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="edica-landing-about">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-4  ">
                        <h5>Exchange rates</h5>
                        <div class="table_rate pb-3 c">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">
                                            <div class="text-center">
                                                <span>{{ date('d.m.Y') }}</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Currency</span>
                                        </td>
                                        <td>
                                            <span>AMD</span>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rates as $rate)
                                        <tr>
                                            <td>{{ $rate->currency }}</td>
                                            <td>{{ $rate->exchange_rate }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </main>
    <section class="edica-footer-banner-section">
        {{-- @include('includes.sidebar') --}}
    @endsection
