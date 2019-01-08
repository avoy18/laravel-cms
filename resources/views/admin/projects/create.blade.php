@extends('layouts.admin')
@section('title', 'Add a new project')

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
                <strong>Add a new project</strong>
            </div>

            <form class="card-body card-block row" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- Name --}}
                <div class="form-group mine col-md-12">
                    <label for="name" class=" form-control-label">Name</label>
                    @if ($errors->has('name'))
                    <span class="d-block invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    <input type="text" id="name" placeholder="Enter the name of your project" name="name" class="form-control">
                </div>
                {{-- ./Name --}}

                {{-- Body/Decription --}}
                <div class="form-group mine col-md-12">
                    <label for="body" class=" form-control-label">Project description</label>
                    @if ($errors->has('body'))
                    <span class="d-block invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                    @endif
                   <textarea name="body" id="body" cols="30" rows="10" placegolder="Enter your project description here"></textarea>
                </div>
                {{-- ./Body/Description --}}

                {{-- Categories --}}
                <div class="form-group mine col-md-6">
                <label for="role" class=" form-control-label">Categories</label>
                @if($categories)
                <select class="standardSelect" multiple name="categories[]" data-placeholder="Choose your category...">
                        @foreach($categories as $c)
                        <option class="selected" value="{{ $c->name }}">{{ $c->name }}</option>
                        @endforeach
                 </select>
                @endif
                </div>
                {{-- ./ Categories --}}
                
                {{-- Images --}}
                <div class="form-group mine col-md-12">
                <label for="role" class=" form-control-label">Images</label>
                    <input type="file" name="images[]" multiple>
                </div>
                {{-- ./ Images --}}

                <div class="mt-30 col-md-12">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>

            </form>
        </div>
        {{-- ./card --}}
    </div>
    {{-- ./row --}}
</div>
{{-- ./container --}}
<style></style>
@endsection

@section('scripts')
    
<script src="{{ asset('/js/lib/chosen/chosen.jquery.min.js') }}"></script>
    <script>
        jQuery(document).ready(function() {


   

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            })
            // .change(function(){
            //     var choice = jQuery('.chosen-choices').children();

            //     for(i = 0; i < choice.length - 1; i++){
         
            //         console.log(choice[i]);
          
            //     }
            
            // });
        });

    </script>
@endsection