@extends('layouts.admin')
@section('title')
Edit {{ $project->name }}
@endsection

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
                <strong>Edit {{ $project->name }}</strong>
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
                    <input type="text" id="name" value="{{ $project->name }}" name="name" class="form-control">
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
                   <textarea name="body" id="body" cols="30" rows="10" value="{{ $project->body }}"></textarea>
                </div>
                {{-- ./Body/Description --}}

                {{-- Categories --}}
                <div class="form-group mine col-md-6">
                <label for="role" class=" form-control-label">Categories</label>
                @if($project['allcats'])
                <select class="standardSelect" multiple name="categories[]" data-placeholder="Choose your categories...">
                    @foreach($project['allcats'] as $c)
                        <option class="selected" value="{{ $c->name }}">{{ $c->name }}</option>
                    @endforeach
                 </select>
                @endif
                </div>
                {{-- ./ Categories --}}
                
                {{-- Images --}}
                <div class="form-group mine col-md-12">
                <label for="role" class=" form-control-label">Add/Remove Images</label>
                @if($project->images)
                {{-- proj-image-holder --}}
                <div class="proj-image-holder d-flex">
                @foreach($project->images as $img)
                <div class="proj-image"><img width="100px" src="{{ asset($img->path) }}" alt=""></div>
                @endforeach
                </div>
                {{-- ./proj-image-holder --}}
                    <input type="file" name="images[]" value="" multiple>
                @endif
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