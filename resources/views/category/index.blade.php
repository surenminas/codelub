@extends('layouts.main')

@section('title')
    {{ 'Category' }}
@endsection

@section('content')
    <div class="mb-5">
        <h1 class="mb-4 mt-4 text-center" data-aos="fade-up">Category</h1>


        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-2 mb-4 mt-4 w-100">

                    <a href="{{ route('category.post.index', $category->slug) }}" class="">
                        <button class="btn btn-success ">
                            <span class="info-box-text text-center  ">{{ $category->title }}</span>
                            <span class="info-box-number text-center  mb-0">({{ $category->posts->count() }})</span>
                        </button></a>

                </div>
            @endforeach

        </div>
    </div>
@endsection
