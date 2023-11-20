@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rates</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Rates</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @error('rate_erroe_update')
                    <div class="d-flex justify-content-center">
                        <div class="alert alert-danger text-center w-25">{{ $message }}</div>
                    </div>
                @enderror

                @if (session()->has('messageRateUpdated'))
                    <div class="d-flex justify-content-center">
                        <div class="alert alert-success text-center w-25">{{ session()->get('messageRateUpdated') }}</div>
                    </div>
                @endif

                <div class="row mb-2 mt-5 ">

                    <div class="col-2">
                        <a href="{{ route('admin.rates.create') }}"><button type="button"
                                class="w-15 btn btn-block btn-primary">Create Rate</button> </a>
                    </div>

                    <div class="col-10 d-flex justify-content-end">

                        <div class="col-3">
                            <a href="{{ route('admin.rates.updateRateData') }}"><button type="button"
                                    class="w-15 btn btn-block btn-primary">Update Rate
                                    Data</button> </a>
                        </div>
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
                                            <th>Country</th>
                                            <th>Rate</th>
                                            <th>Exchange Price</th>
                                            <th colspan="3">Settings</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rates as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->country }}</td>
                                                <td>{{ $item->currency }}</td>
                                                <td>{{ $item->exchange_rate }}</td>
                                                <td><a class="text-success"
                                                        href="{{ route('admin.rates.edit', $item->id) }}"><i
                                                            class="far fa-edit"></i></a>
                                                </td>
                                                @can('deleteAnyInfomation', auth()->user())
                                                    <td>
                                                        <form action="{{ route('admin.rates.destroy', $item->id) }}"
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

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!--/. container-fluid -->
@endsection
