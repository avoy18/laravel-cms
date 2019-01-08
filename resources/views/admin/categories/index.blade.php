@extends('layouts.admin')
@section('title', 'Categories')


@section('content')


{{-- categories --}}
<div class="categories">
    @if(Session::has('success'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ Session::get('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <form method="post" action="{{ route('categories.store') }}">
                @csrf
                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class=" form-control-label">New Category</label>
                    @if ($errors->has('name'))
                    <span class="d-block invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    <input type="text" id="name" placeholder="Enter the name of the category" name="name" class="form-control">
                </div>
                {{-- ./Name --}}


                <div class="mt-30">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>

            </form>
        </div>

        <div class="col-md-6 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">All Categories </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th></th>
                                    <th>Name</th>
                                    <th># of Projects</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($allcategories)
                                @foreach($allcategories as $category)
                                <tr>
                                    <td class="number">{{ $loop->iteration }}</td>
                                    <td class="edit"><a href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-pencil"></i> Edit</a></td>
                                    <td> <span class="name">{{
                                                $category->name }}</span> </a></td>
                                    <td>{{ !empty($category->projects) ? count($category->projects) : '0' }}</td>
                                    <td><a class="danger" href="{{ route('categories.destroy', $category->id) }}" onclick="event.preventDefault(); document.getElementById('category-delete').setAttribute('action' , '{{ route('categories.destroy', $category->id) }}'); document.getElementById('category-delete').submit()"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div> {{-- ./ table-stats --}}
                </div>
            </div> {{-- ./card --}}
        </div> {{-- col-lg --}}

    </div>
</div>
{{-- ./categories --}}

{{-- delete category --}}
<form method="POST" id="category-delete" style="display:none">
        @csrf
            <input type="hidden" name="_method" value="DELETE">
        </form>
{{-- ./ delete category --}}


@endsection
