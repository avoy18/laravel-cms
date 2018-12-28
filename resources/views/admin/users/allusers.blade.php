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
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            @if( !$user->avatar == null )
                                                        <a href="{{ url('users', $user->id) }}"><img class="rounded-circle" src="{{ asset('images/'), $user->avatar }}" alt=""></a>
                                                            @else
                                                            <a href="{{ url('users', $user->id) }}"><img class="rounded-circle" src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                <td> <a href="{{ url('users', $user->id) }}"> <span class="name">{{ $user->name }}</span> </a></td>
                                                    <td> <span class="role">{{ $user->role->name}}</span> </td>
                                                    <td>
                                                        @if( $user->is_active == 1)
                                                        <span class="badge badge-complete">Active</span>
                                                        @else 
                                                        <span class="badge badge-danger">Inactive</span>
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