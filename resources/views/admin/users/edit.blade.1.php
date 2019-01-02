@extends('layouts.admin')
@section('title', 'Edit user')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-xl-6 col-lg-12">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ Session::get('success') }}
                </div>
                @endif
                <div class="card-header">
                    <strong>Add a new user</strong>
                </div>
                @if($user)
                <form class="card-body card-block row" method="POST" action="{{ url('admin/users', $user->id) }}" enctype="multipart/form-data" >
                    @csrf 
                    {{-- Name --}}
                    <div class="form-group col-md-6">
                        <label for="name" class=" form-control-label">Name</label>
                        @if ($errors->has('name'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        <input type="text" id="name" value="{{ $user->name }}" name="name" class="form-control">
                    </div>
                    {{-- ./Name --}}

                    {{-- Email --}}
                    <div class="form-group col-md-6">
                        <label for="email" class=" form-control-label">Email</label>
                        @if ($errors->has('email'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <input type="text" id="email" value="{{ $user->email }}" name="email" class="form-control">
                    </div>
                    {{-- ./Email --}}


                    {{-- Pass --}}
                    <div class="form-group col-md-6">
                        <label for="password" class=" form-control-label">Password</label>
                        @if ($errors->has('password'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <input type="password" id="password" placeholder="Set new password" name="password" class="form-control">
                    </div>
                    {{-- ./Pass --}}

                    {{-- Pass2 --}}
                    <div class="form-group col-md-6">
                        <label for="password2" class=" form-control-label">Confirm Password</label>
                        @if ($errors->has('password_confirmation'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                        <input type="password" id="password2" placeholder="Confirm new password" name="password_confirmation" class="form-control">
                    </div>
                    {{-- ./Pass2 --}}

                    {{-- Role --}}
                    <div class="form-group col-md-6">
                        <label for="role" class=" form-control-label">User Role</label>
                        <select  id="role" name="role_id" class="form-control">
                               
                      
                            @if($user->role)
                            <option class="default" value="{{ $user->role->id }}">{{ $currentrole }}</option>
                            @else
                            
                            @endif
                            @if($user['allroles'])
                                @foreach($user['allroles'] as $r)
                                    @if($r->name !== $currentrole)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    {{-- ./Role --}}

                    {{-- Status --}}
                    <div class="form-group col-md-6">
                        <label for="is_active" class="form-control-label">User Status</label><br>
                        <input type="radio" name="is_active" @if($user->is_active == 1 ) checked @endif value="1" > Active<br>
                        <input type="radio" name="is_active" @if($user->is_active == 0 ) checked @endif value="0"> Not Active<br>
                        
                    </div>
                    {{-- ./Status --}}

                    {{-- File --}}
                    <div class="form-group col-md-6">
                        <label for="avatar" class=" form-control-label">User Avatar</label>
                        @if ($errors->has('avatar'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                        @endif
                        <br>
                        <img class="rounded-circle" width="50px" src="{{ $user->image ? asset($user->image->path) : asset('images/avatar/1.jpg')  }}" alt="">
                        <input type="file" name="avatar">
                    </div>
                    {{-- ./File --}}

                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    
                </form>
                @endif
            </div>
            {{-- ./card --}}
        </div>
        {{-- ./row --}}
    </div>
    {{-- ./container --}}
    

@endsection