@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                @error('gallery_update_error')
                    <div class="d-flex justify-content-center">
                        <div class="alert alert-danger text-center w-25">{{ $message }}</div>
                    </div>
                @enderror

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit photo </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Info boxes -->
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('admin.gallery.index') }}"><button type="button"
                                class="btn btn-block btn-primary">Back</button> </a>
                    </div>
                    <div class="col-12 mt-3">
                        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group mb-3 w-25">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title"
                                    value="{{ $gallery->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <label>Select Album</label>
                                <select class="custom-select" name="album">
                                    @foreach ($albums as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $gallery->album_id ? 'selected' : '' }}>{{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group w-25">
                                <label for="">Choose image</label>
                                <div class="custom-file">
                                    <input type="file" value="{{ $gallery->img_path }}" class="custom-file-input"
                                        name="image">
                                    <label class="custom-file-label"></label>
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-25 mb-3">
                                <label for="">Current images</label>
                                <img src="{{ asset('storage/image/' . $gallery->img_path) }}" class="w-100 ">
                            </div>

                            <button type="submit" class="mt-3 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
