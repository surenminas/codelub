@extends('layouts.main')

@section('title')
    {{ $categoryName }}
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12 mb-5">
            <h2 class="mt-4 text-center" data-aos="fade-up">Category</h2>
            <ol class="breadcrumb justify-content-center bg-transparent text-dark">
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                <li class="breadcrumb-item active">{{ $categoryName }}</li>
            </ol>
        </div>


        <div class="col-md-12">
            <section>
                <div class="row blog-post-row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/image/' . $post->image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="blog-post-category">{{ $post->category->title }}</p>
                                </div>
                                <div>
                                    @auth
                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
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
    </div>
@endsection
