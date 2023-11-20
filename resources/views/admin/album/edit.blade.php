@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                @error('album_update_error')
                    <div class="d-flex justify-content-center">
                        <div class="alert alert-danger text-center w-25">{{ $message }}</div>
                    </div>
                @enderror

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Album</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.album.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Album</li>
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
                        <a href="{{ route('admin.album.index') }}"><button type="button"
                                class="btn btn-block btn-primary">Back</button> </a>
                    </div>
                    <div class="col-12 mt-3">
                        <form action="{{ route('admin.album.update', $album->slug) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group mb-3 w-25">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title"
                                    value="{{ $album->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <label for="">Choose images</label>
                                <div class="custom-file">
                                    <input type="file" value="{{ old('image') }}" class="custom-file-input"
                                        name="image">
                                    <label class="custom-file-label"></label>
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-3">
                                <label for="">Current image</label>
                                <img src="{{ asset('storage/image/' . $album->cover_path) }}" class="w-100 ">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
