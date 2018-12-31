@extends('layouts.admin')
@section('title', 'Add a new user')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-xl-6 col-lg-12">
                @if(Session::has('success'))
                {{ Session::get('success') }}
                @elseif($errors->any())
                    @foreach($errors as $e)
                    {{ $e }}
                    @endforeach
                @endif
                <div class="card-header">
                    <strong>Add a new user</strong>
                </div>
                
                <form class="card-body card-block row" method="post" action="/admin/users" enctype="multipart/form-data" >
                    @csrf 
                    {{-- Name --}}
                    <div class="form-group col-md-6">
                        <label for="name" class=" form-control-label">Name</label>
                        <input type="text" id="name" placeholder="Enter the name of the user" name="name" class="form-control">
                    </div>
                    {{-- ./Name --}}

                    {{-- Email --}}
                    <div class="form-group col-md-6">
                        <label for="email" class=" form-control-label">Email</label>
                        <input type="text" id="email" placeholder="Enter user's email" name="email" class="form-control">
                    </div>
                    {{-- ./Email --}}


                    {{-- Pass --}}
                    <div class="form-group col-md-6">
                        <label for="password" class=" form-control-label">Password</label>
                        <input type="password" id="password" placeholder="Enter user's password" name="password" class="form-control">
                    </div>
                    {{-- ./Pass --}}

                    {{-- Pass2 --}}
                    <div class="form-group col-md-6">
                        <label for="password2" class=" form-control-label">Confirm Password</label>
                        <input type="password" id="password2" placeholder="Confirm user's password" name="password_confirmation" class="form-control">
                    </div>
                    {{-- ./Pass2 --}}

                    {{-- Role --}}
                    <div class="form-group col-md-6">
                        <label for="role" class=" form-control-label">User Role</label>
                        <select  id="role" name="role_id" class="form-control">
                        </select>
                    </div>
                    {{-- ./Role --}}

                    {{-- Status --}}
                    <div class="form-group col-md-6">
                        <label for="is_active" class="form-control-label">User Status</label><br>
                        <input type="radio" name="is_active" value="1" checked> Active<br>
                        <input type="radio" name="is_active" value="0"> Not Active<br>
                    </div>
                    {{-- ./Status --}}

                    {{-- File --}}
                    <div class="form-group col-md-6">
                        <label for="avatar" class=" form-control-label">User Avatar</label>
                        <input type="file" name="avatar">
                    </div>
                    {{-- ./File --}}

                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    
                </form>
            </div>
            {{-- ./card --}}
        </div>
        {{-- ./row --}}
    </div>
    {{-- ./container --}}
    

@endsection