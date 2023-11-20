@extends('layouts.main')

@section('title')
    {{ 'Personal' }}
@endsection

@section('content')
    <main>
        <div class="container">
            <!-- Info boxes -->
            <div class="row">

                <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
                    <div class="card-body table-responsive p-0">

                        <form action="{{ route('personal.comment.update', $comment->id) }}" method="post"
                            class="w-50">
                            @csrf
                            @method('patch')

                            <div class=" mb-3">
                                <textarea class="form-control" name="message">{{ $comment->message }}</textarea>
                                @error('message')
                                    <div class="text-danger">Incorect text</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </main>
@endsection