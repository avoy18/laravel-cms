@extends('layouts.admin')
@section('title')
{{ $user->name }}'s Profile
@endsection

@section('content')

<div class="row">

        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Profile</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" alt="Card image cap" width="100" src="{{ $user->image ? asset($user->image->path) : asset('images/admin.jpg') }}">
                            <h5 class="text-sm-center mt-2 mb-1">{{ $user->name }}</h5>
                            <div class="text-sm-center">{{ $user->role ? $user->role->name : '' }}</div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center d-flex" style="justify-content: space-between">
                            <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope pr-1"></i> Email</a>
                            <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil pr-1"></i> Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
</div>

@stop

