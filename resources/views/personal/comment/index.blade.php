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
                    <h2 class="mt-4 text-center" data-aos="fade-up">Commnet</h2>
                    <ol class="breadcrumb justify-content-center bg-transparent text-dark">
                        <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">My Activity</a></li>
                        <li class="breadcrumb-item active">Comment</li>
                    </ol>
                </div>

                <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                    <div class="card-body table-responsive p-0">

                        <table class="table ">
                            <thead >
                                <tr>
                                    <th scope="col-lg-5">Post</th>
                                    <th scope="col-lg-5">Comment</th>
                                    <th scope="col-lg-2">Settings</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td><a class="a_link_color" href="{{ route('post.show', $comment->post->slug) }}"
                                                target="_blank">{{ $comment->post->title }} </a>
                                        </td>
                                        <td>{{ $comment->message }}</td>
                                        <td><a class="text-success"
                                                href="{{ route('personal.comment.edit', $comment->id) }}"><i
                                                    class="far fa-edit"></i></a></td>

                                        <td>
                                            <form action="{{ route('personal.comment.delete', $comment->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="deleteBtn bg-transparent border-0"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $comments->links() }}
                </div>

                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </main>
@endsection
