@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Articles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Articles</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Serach -->
                <h3 class="text-center display-4">Search</h3>

                <form action="{{ route('admin.post.index') }}" data-select2-id="10">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tags:</label>
                                        <select class="select2 select2-hidden-accessible" multiple="" name="tags[]"
                                            data-placeholder="Any" style="width: 100%;" data-select2-id="1" tabindex="-1"
                                            aria-hidden="true">
                                            @foreach ($postSearchData['allTags'] as $item)
                                                <option
                                                    {{ is_array(old('tags')) && in_array($item->id, old('tags')) ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <select class="select2 select2-hidden-accessible" name="category_id"
                                            data-placeholder="Select Category" style="width: 100%;" data-select2-id="1"
                                            tabindex="-1" aria-hidden="true">
                                            @foreach ($postSearchData['allCategories'] as $item)
                                                <option value="">Select Category</option>
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('category') ? 'selected' : '' }}>{{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="search" name="title" class="form-control form-control-lg"
                                        placeholder="Type post keywords here" value="{{ $postSearchData['searchTitle'] }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-10 offset-md-1" data-select2-id="21">
                            <div class="row" data-select2-id="20">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <select class="select2 select2-hidden-accessible" name="category_id"
                                            data-placeholder="Select Category" style="width: 100%;" data-select2-id="1"
                                            tabindex="-1" aria-hidden="true">
                                            @foreach ($postSearchData['categories'] as $item)
                                                <option value="">Select Category</option>
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('category') ? 'selected' : '' }}>{{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tags:</label>
                                        <select class="select2 select2-hidden-accessible" name="category_id"
                                            data-placeholder="Select Category" style="width: 100%;" data-select2-id="1"
                                            tabindex="-1" aria-hidden="true">
                                            @foreach ($postSearchData['categories'] as $item)
                                                <option value="">Select Category</option>
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('category') ? 'selected' : '' }}>{{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="search" name="title" class="form-control form-control-lg"
                                        placeholder="Type post keywords here" value="{{ $postSearchData['searchTitle'] }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
                <!-- Info boxes -->
                <div class="row mb-2 mt-5">
                    <div class="col-2">
                        <a href="{{ route('admin.post.create') }}"><button type="button"
                                class="w-15 btn btn-block btn-primary">Create post</button> </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Comment</th>
                                            <th>Category</th>
                                            <th colspan="3">Settings</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($postSearchData['posts'] as $item)
                                        {{-- @dd($item) --}}
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td><a
                                                        href="{{ route('admin.post.comment.index', $item->slug) }}">Comment</a>
                                                </td>
                                                <td>{{ $item->category->title }}</td>
                                                <td><a href="{{ route('admin.post.show', $item->slug) }}"><i
                                                            class="fas fa-eye"></i></a>
                                                </td>
                                                <td><a class="text-success"
                                                        href="{{ route('admin.post.edit', $item->slug) }}"><i
                                                            class="far fa-edit"></i></a>
                                                </td>
                                                @can('deleteAnyInfomation', auth()->user())
                                                    <td>
                                                        <form action="{{ route('admin.post.destroy', $item->slug) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="deleteBtn bg-transparent border-0"><i
                                                                    class="fas fa-trash text-danger"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="mt-3">
                            {{ $postSearchData['posts']->withQueryString()->links() }}
                        </div>
                        <!-- /.card -->
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
