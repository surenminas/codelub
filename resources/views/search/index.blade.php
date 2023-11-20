@extends('layouts.main')

@section('title')
    {{ $_GET['s'] }}
@endsection

@section('content')
    <main>
        <div class="row mt-5">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row ">
                        @if ($searchData['posts'] === 'no_result')
                            <div class="col-lg d-flex justify-content-center">
                                <div class="searchResult d-flex justify-content-center">
                                    <h3>No result</h3>
                                </div>
                            </div>
                        @else
                            @foreach ($searchData['posts'] as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/image/'. $post->image) }}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="blog-post-category">{{ $post->category_name }}</p>
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
                        @endif

                    </div>
                </section>
                @if ($searchData['posts'] != 'no_result')
                    {{ $searchData['posts']->withQueryString()->links() }}
                @endif

            </div>

            @include('includes.sidebar')
        </div>
    </main>
@endsection
