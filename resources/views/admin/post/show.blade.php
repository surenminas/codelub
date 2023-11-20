@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0">{{ $post->title }}</h1>
                        <div class="ml-2">
                            <a class="text-success" href="{{ route('admin.post.edit', $post->slug) }}"><i
                                    class="far fa-edit"></i></a>
                        </div>
                        @can('deleteAnyInfomation', auth()->user())
                            <div class="ml-2">
                                <form action="{{ route('admin.post.destroy', $post->slug) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="deleteBtn bg-transparent border-0"><i
                                            class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Articles</a></li>
                            <li class="breadcrumb-item active">Show</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('admin.post.index') }}"><button type="button"
                                class="btn btn-block btn-primary">Back</button> </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $post->title }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
