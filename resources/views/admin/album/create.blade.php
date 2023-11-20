@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">

            @error('album_create_error')
                <div class="d-flex justify-content-center">
                    <div class="alert alert-danger text-center w-25">{{ $message }}</div>
                </div>
            @enderror
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Create Album</h1>
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
                            <form action="{{ route('admin.album.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3 w-25">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group w-25">
                                    <label for="">Choose images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image">
                                        <label class="custom-file-label"></label>
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="mt-3 btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
