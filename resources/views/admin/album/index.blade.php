@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Album</h1>
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
                <div class="row mb-2 mt-5 ">

                    <div class="col-2">
                        <a href="{{ route('admin.album.create') }}"><button type="button"
                                class="w-15 btn btn-block btn-primary">Create Album</button> </a>
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
                                            <th>Cover</th>
                                            <th colspan="3">Settings</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($albums as $album)
                                            <tr>
                                                <td>{{ $album->id }}</td>
                                                <td>{{ $album->title }}</td>
                                                <td><img style="height:100%;max-height:50px"src="{{ asset('storage/image/' . $album->cover_path) }}"
                                                        alt="cover"></td>
                                                <td><a class="text-success"
                                                        href="{{ route('admin.album.edit', $album->slug) }}"><i
                                                            class="far fa-edit"></i></a>
                                                </td>
                                                @can('deleteAnyInfomation', auth()->user())
                                                    <td>
                                                        <form action="{{ route('admin.album.destroy', $album->slug) }}"
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
                        <div class="mt-3">
                            {{-- {{ $posts->withQueryString()->links() }} --}}
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
    </div>
@endsection
