@extends('layouts.main')

@section('title')
    {{ 'Blog' }}
@endsection

@section('content')
    <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
    <section class="featured-posts-section">
        <div class="row">
            @foreach ($randomPosts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ asset($post->image) }}" alt="blog post">
                        {{-- <img src="{{ asset('storage/image/' . $post->image) }}" alt="blog post"> --}}
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                        </div>

                        <div>
                            @auth
                                <form action="{{ route('post.like.store', $post->slug) }}" method="post">
                                    @csrf
                                    <span>{{ $post->likes_count }}</span>
                                    <button type="submit" class="bg-transparent border-0">
                                        <i
                                            class="fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                                    </button>
                                </form>
                            @endauth
                            @guest
                                <span>{{ $post->likes_count }}</span>
                                <i class="far fa-heart"></i>
                            @endguest

                        </div>
                    </div>
                    <a href="{{ route('post.show', $post->slug) }}" class="blog-post-permalink">
                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                    </a>
                </div>
            @endforeach

        </div>
    </section>
    <div class="row">
        <div class="col-md-8">
            <section>
                <div class="row blog-post-row">
                    @foreach ($posts as $post)
                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/image/' . $post->image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="blog-post-category">{{ $post->category->title }}</p>
                                </div>
                                <div>
                                    @auth
                                        <form action="{{ route('post.like.store', $post->slug) }}" method="post">
                                            @csrf
                                            <span>{{ $post->liked_users_count }}</span>
                                            <button type="submit" class="bg-transparent border-0">
                                                <i
                                                    class="fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                                            </button>
                                        </form>
                                    @endauth
                                    @guest
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="far fa-heart"></i>
                                    @endguest

                                </div>
                            </div>

                            <a href="{{ route('post.show', $post->slug) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
            {{ $posts->links() }}
        </div>
        @include('includes.sidebar')

    </div>
@endsection
