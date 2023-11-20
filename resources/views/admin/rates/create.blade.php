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

                <div class="row mb-2 mt-5 ">
                    <div class="col-2">
                        <a href="{{ route('admin.rates.index') }}"><button type="button"
                                class="w-15 btn btn-block btn-primary">Backe</button> </a>
                    </div>
                </div>


                <div class="col-lg-12 mt-3">
                    <form action="{{ route('admin.rates.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3 w-25">
                            <label for="" class="form-label">Country Name</label>
                            <input type="text" name="country" class="form-control" placeholder="Country Name">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group w-25">
                            <input type="text" name="currency" class="form-control" placeholder="Symbole">
                            @error('currency')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @error('currency_exists')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('currency_existsdd')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="mt-3 btn btn-primary">Create</button>
                    </form>

                    <!-- /.card-body -->

                </div>
            </div>

            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!--/. container-fluid -->
@endsection
