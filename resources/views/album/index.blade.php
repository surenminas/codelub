@extends('layouts.main')

@section('title')
    {{ 'Album' }}
@endsection

@section('content')
    <div class="mb-5">
        <h1 class="mb-4 mt-4 text-center" data-aos="fade-up">Album</h1>

        <div class="row">

            @foreach ($albums as $album)
                <div class="col-lg-3 col-md-6 album-blok mb-4">
                    <div class="inner">

                        <div class="thumbnail">
                            <a href="{{ route('album.gallery.index', $album->slug) }}">
                                <img src="{{ asset('storage/image/' . $album->cover_path) }}" class="" alt="album">
                            </a>
                        </div>
                        <div class="info-box bg-white">
                            <div class="info-box-content text-center text-white">
                                <span class="info-box-text text-center text-white ">{{ $album->title }} &puncsp;</span>
                                <span class="info-box-number text-center text-white mb-0">
                                    ({{ $album->galleries->count() }})</span>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5">
            {{ $albums->links() }}
        </div>
    </div>
@endsection
