@extends('../layout')

@section('content')
<h1>Job edit</h1>
  <form action="{{ action('JobController@update', [$job->id]) }}" method="post">
    @method('put')
    @csrf
    <div id="job_form">
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Name">Company:</label>
            <input type="text" class="form-control" name="company" value="{{$job->company}}"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Name">Description:</label>
            <textarea rows="4" cols="50" class="form-control" name="description">{{$job->description}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Name">How to apply:</label>
            <textarea rows="4" cols="50" class="form-control" name="how_to_apply">{{$job->how_to_apply}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Name">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$job->email}}"/>
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