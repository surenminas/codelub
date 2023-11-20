@extends('layouts.main')

@section('title')
    {{ 'Account' }}
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12 mb-4 mt-5 bg-white shadow rounded-lg p-5">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col-lg-12 mb-4 bg-white shadow rounded-lg p-5">
            @include('profile.partials.update-password-form')
        </div>

        <div class="col-lg-12 mb-4 bg-white shadow rounded-lg p-5">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
