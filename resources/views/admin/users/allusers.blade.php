@extends('layouts.admin')
@section('title', 'Users')


@section('content')


                {{-- users --}}
                <div class="users">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">All Users </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th></th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($allusers)
                                                @foreach($allusers as $user)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="edit"><a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil"></i>Edit User</a></td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                        <a href="{{ route('users.show', $user->id) }}"><img class="rounded-circle" src="{{ $user->image ? asset($user->image->path) : asset('images/avatar/1.jpg')  }}" alt=""></a>
                                                        </div>
                                                    </td>
                                                <td> <a href="{{ route('users.show', $user->id) }}"> <span class="name">{{ $user->name }}</span> </a></td>
                                                    <td> <span class="role">{{ $user->role ? $user->role->name : 'No Role' }} </span> </td>
                                                    <td>
                                                        @if( !$user->is_active == 1)
                                                        <span class="badge badge-danger">Inactive</span>
                                                        @else 
                                                        <span class="badge badge-complete">Active</span>

                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div> {{-- ./ table-stats --}}
                                </div>
                            </div> {{-- ./card --}}
                        </div>  {{-- col-lg --}}
    
                    </div>
                </div>
             {{-- ./users --}}


@endsection