@extends('layouts.main')

@section('title')
    {{ $galleryName }}
@endsection

@section('content')
    <div class="row mb-3">
        @if ($galleries === 'no_result')
            <div class="col-lg-12 mb-3">
                <h2 class="mt-4 text-center" data-aos="fade-up">{{ $galleryName }}</h2>

                <ol class="breadcrumb justify-content-center bg-transparent text-dark">
                    <li class="breadcrumb-item"><a href="{{ route('album.index') }}">Album</a></li>
                    <li class="breadcrumb-item active">{{ $galleryName }}</li>
                </ol>
                <h3 class="mt-4 text-center" data-aos="fade-up">No Photos To Show</h3>

            </div>
        @else
            <div class="col-lg-12 mb-3">
                <h2 class="mt-4 text-center" data-aos="fade-up">{{ $galleryName }}</h2>
                <ol class="breadcrumb justify-content-center bg-transparent text-dark">
                    <li class="breadcrumb-item"><a href="{{ route('album.index') }}">Album</a></li>
                    <li class="breadcrumb-item active">{{ $galleryName }}</li>
                </ol>
            </div>
            <div class="gallery">
                @foreach ($galleries as $item)
                    <a href="{{ asset('storage/image/' . $item->img_path) }}">
                        <img src="{{ asset('storage/image/' . $item->img_path) }}" alt="">
                    </a>
                @endforeach
            </div>



            <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">X</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>

    </div>
    <div class="mb-5">
        {{ $galleries->links() }}
    </div>
    @endif

@endsection
