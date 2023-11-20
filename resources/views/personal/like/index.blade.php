@extends('layouts.main')

@section('title')
    {{ 'Personal' }}
@endsection

@section('content')
    <main>
        <div class="container">
            <!-- Info boxes -->
            <div class="row">

                <div class="col-lg-12 mb-3">
                    <h2 class="mt-4 text-center" data-aos="fade-up">Liked</h2>
                    <ol class="breadcrumb justify-content-center bg-transparent text-dark">
                        <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">My Activity</a></li>
                        <li class="breadcrumb-item active">Liked</li>
                    </ol>
                </div>
                

                <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th colspan="3">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <form action="{{ route('personal.like.delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-transparent border-0"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
                <!-- ./col -->


            </div>
            <!-- /.row -->
        </div>
    </main>
@endsection
