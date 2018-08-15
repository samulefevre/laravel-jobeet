@extends('../layout')

@section('content')
<h1>Job edit</h1>
  <form action="{{ action('JobController@update', [$job->token]) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    @include('layouts.errors')
    <div id="job_form">
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <label for="Name">Category:</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($job->category->id === $category->id) selected="selected" @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <label for="Name">Type:</label>
                <select class="form-control" name="type">
                    @foreach ($job->types as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">Company:</label>
            <input type="text" class="form-control" name="company" value="{{ $job->company }}"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">Logo:</label>
            <input type="file" class="form-control" name="logo" accept="image/png, image/jpeg"/>
            <img src="{{ asset('storage/'.$job->logo) }}" alt="logo" class="company-logo" />            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">Url:</label>
            <input type="text" class="form-control" name="url" value="{{ $job->url }}" placeholder="https://example.com"/>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <label for="Name">Position:</label>
                <input type="text" class="form-control" name="position" value="{{ $job->position }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <label for="Name">Location:</label>
                <input type="text" class="form-control" name="location" value="{{ $job->location }}"/>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">Description:</label>
            <textarea rows="4" cols="50" class="form-control" name="description">{{ $job->description }}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">How to apply:</label>
            <textarea rows="4" cols="50" class="form-control" name="how_to_apply">{{ $job->how_to_apply }}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">Public:</label>
            <input type="checkbox" class="form-control" name="is_public" value="is_public" @if($job->is_public === 1) checked="checked" @endif />
            <br /> Whether the job can also be published on affiliate websites or not.
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12">
            <label for="Name">Email:</label>
            <input type="text" class="form-control" name="email" value="{{ $job->email }}" placeholder="email@example.com" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12" style="margin-top:10px">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
    </div>
  </form>
@endsection