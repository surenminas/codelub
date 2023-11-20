@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Article</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Articles</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @error('post_create_error')
                    <div class="d-flex justify-content-center">
                        <div class="alert alert-danger text-center w-25">{{ $message }}</div>
                    </div>
                @enderror

                <!-- Info boxes -->
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('admin.post.index') }}"><button type="button"
                                class="btn btn-block btn-primary">Back</button> </a>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->slug) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group mb-3 w-25">
                                <label for="" class="form-label">Title</label>
                                <input type="text" value="{{ $post->title }}" name="title" class="form-control"
                                    placeholder="Title">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group w-50">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <label>Select category</label>
                                <select class="custom-select" name="category">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $post->category_id ? 'selected' : '' }}>{{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group w-25">
                                <label>Tags</label>
                                <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select a Tags"
                                    style="width: 100%;">
                                    @foreach ($tags as $item)
                                        <option
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($item->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-25">
                                <img src="{{ url('storage/image/' . $post->image) }}" alt="image" class="w-100">
                            </div>
                            <div class="form-group w-25">
                                <label for="">Choose images</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label"></label>
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-25">
                                <img src="{{ url('storage/image/' . $post->image_preview) }}" alt="preview image" class="w-100">
                            </div>
                            <div class="form-group w-25">
                                <label for="customFile">Choose preview image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image_preview">
                                    <label class="custom-file-label"></label>
                                </div>
                                @error('image_preview')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">Update</button>
                        </form>
                    </div>


                </div>

            </div>
            <!-- /.row -->




    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
