@extends('layouts.main')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->format('F d, Y H:i') }} •
                {{ $post->comment->count() }} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/image/' . $post->image) }}" alt="featured image" class="w-100">
            </section>

            <section class="post-content">

                {{-- <div class="row mb-5">
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="assets/images/blog_post_1.jpg" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-up">
                        <img src="assets/images/blog_post_2.jpg" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-left">
                        <img src="assets/images/blog_post_3.jpg" alt="blog post" class="img-fluid">
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <section>
                <div>
                    @auth
                        <form action="{{ route('post.like.store', $post->slug) }}" method="post">
                            @csrf
                            <span>{{ $post->liked_users_count }}</span>
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                            </button>
                        </form>
                    @endauth
                    @guest
                        <span>{{ $post->liked_users_count }}</span>
                        <i class="far fa-heart"></i>
                    @endguest
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('storage/image/' . $relatedPost->image) }}" alt="related post"
                                        class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost->slug) }}">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </section>
                    <section class='comment mb-5'>
                        <h3>Commnets ({{ $post->comment->count() }})</h3>
                        @foreach ($post->comment as $comment)
                            <div class="card-comment">
                                <!-- User image -->
                                {{-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image"> --}}
                                <div class="comment-text mb-3">
                                    <div>
                                        <span class="username" style="font-weight: bold">
                                            @if ($comment->user === null)
                                                <span>User Deleted</span>
                                            @else
                                                {{ $comment->user->name }}
                                            @endif
                                            <span
                                                class="text-muted float-right">{{ $comment->DateAsCarbone->diffForHumans() }}</span>
                                        </span><!-- /.username -->
                                    </div>
                                    <div class="pl-3">
                                        {{ $comment->message }}
                                    </div>
                                </div>
                                <!-- /.comment-text -->
                            </div>
                        @endforeach

                    </section>

                    @auth
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply </h2>
                            <form action="{{ route('post.comment.store', $post->slug) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label class="sr-only">Comment</label>
                                        <textarea name="message" class="form-control" placeholder="Comment" rows="10"></textarea>
                                        @error('message')
                                            <div class="text-danger pl-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth

                </div>
            </div>
        </div>
    </main>
@endsection
