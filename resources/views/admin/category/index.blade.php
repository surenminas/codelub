@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                        <a href="{{ route('admin.category.create') }}"><button type="button"
                                class="w-15 btn btn-block btn-primary">Create category</button> </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 mt-3">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th colspan="3">Settings</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td><a href="{{ route('admin.category.show', $category->slug) }}">
                                                        <i class="fas fa-eye"></i></a>
                                                </td>
                                                <td><a class="text-success"
                                                        href="{{ route('admin.category.edit', $category->slug) }}">
                                                        <i class="far fa-edit"></i></a>
                                                </td>
                                                @can('deleteAnyInfomation', auth()->user())
                                                    <td>
                                                        <form action="{{ route('admin.category.delete', $category->slug) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="deleteBtn bg-transparent border-0"><i
                                                                    class="fas fa-trash text-danger"></i></button>
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
