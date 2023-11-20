@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Activity</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
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
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{ $data['likedCount'] }}<sup style="font-size: 20px"></sup></h3>
          
                          <p>Liked</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-heart"></i>                        </div>
                        <a href="{{ route('admin.personal.like.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{ $data['commentCount'] }}</h3>
          
                          <p>Comment</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comment"></i>
                        </div>
                        <a href="{{ route('admin.personal.comment.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <!-- ./col -->
                  </div>
                <!-- /.row -->

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
