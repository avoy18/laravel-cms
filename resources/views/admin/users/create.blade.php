@extends('layouts.admin')
@section('title', 'Add a new user')

@section('content')

<div class="col-lg-6">
        <div class="card">
            <div class="card-header"><strong>Add a new user</div>
            <form class="card-body card-block row" method="post" action="store">
                {{-- form group 1 --}}
                <div class="form-group col-md-6">
                    <label for="name" class=" form-control-label">Name</label>
                    <input type="text" id="name" placeholder="Enter the name of the user" name="name" class="form-control">
                </div>
                {{-- ./form group 1 --}}

                {{-- form group 2 --}}
                <div class="form-group col-md-6">
                    <label for="email" class=" form-control-label">Email</label>
                    <input type="text" id="email" placeholder="Enter user's email" name="email" class="form-control">
                </div>
                {{-- ./form group 2 --}}

                {{-- form group 3 --}}
                <div class="form-group col-md-6">
                    <label for="password" class=" form-control-label">Password</label>
                    <input type="text" id="password" placeholder="Enter user's password" name="password" class="form-control">
                </div>
                {{-- ./form group 3 --}}

                {{-- form group 4 --}}
                <div class="form-group col-md-6">
                    <label for="password2" class=" form-control-label">Confirm Password</label>
                    <input type="text" id="password2" placeholder="Confirm user's password" name="password2" class="form-control">
                </div>
                {{-- ./form group 4 --}}

                {{-- form group 5 --}}
                <div class="form-group col-md-6">
                    <label for="role" class=" form-control-label">User Role</label>
                    <select  id="role" name="role" class="form-control">
                        <option>Subscriber</option>
                        <option>Editor</option>
                        <option>Administrator</option>
                    </select>
                </div>
                {{-- ./form group 4 --}}

                <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                
            </form>
        </div>
    </div>

@endsection