@extends('layouts.main')

@section('title')
    {{ 'Personal' }}
@endsection

@section('content')
    <main>
        <div class="container">
            <!-- Info boxes -->
            <div class="row">

                {{-- @dd($data) --}}
                @if (isset($data['post']))
                    <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                        <section>
                            <header>
                                <h3 class="font-weight-bold">
                                    Comment ({{ $data['commentCount'] }})
                                </h3>

                                <p class="mt-1 text-sm ">
                                    Below you can see your last comment post
                                </p>
                            </header>

                            <div>
                                {{ $data['post']->title }}
                            </div>
                            <div class="h4">
                                <p>"{{ $data['comments']->message }}"</p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('personal.comment.index') }}" class="text-info">Comment list <i
                                        class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>

                        </section>
                    </div>
                @else
                    <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                        <section>
                            <header>
                                <h3 class="font-weight-bold">
                                    Comment (0)
                                </h3>

                                <p class="mt-1 text-sm ">
                                    You have no comments
                                </p>
                            </header>
                        </section>
                    </div>
                @endif

                @if ($data['likedCount'] != 0)
                    <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                        <section>
                            <header>
                                <h3 class="font-weight-bold">
                                    Liked ({{ $data['likedCount'] }}<sup style="font-size: 20px"></sup>)
                                </h3>

                                <p class="mt-1 text-sm ">
                                    Below you can see your last liked post
                                </p>
                            </header>

                            <div class="h4">
                                <a href=" {{ route('post.show', $data['likedPost']->id) }}" class="text-dark">
                                    {{ $data['likedPost']->title }}
                                </a>

                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('personal.like.index') }}" class="text-info">Liked list <i
                                        class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>

                        </section>
                    </div>
                @else
                    <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                        <section>
                            <header>
                                <h3 class="font-weight-bold">
                                    Liked (0<sup style="font-size: 20px"></sup>)
                                </h3>

                                <p class="mt-1 text-sm ">
                                    You have no liked post
                                </p>
                            </header>
                        </section>
                    </div>
                @endif

                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </main>
@endsection
