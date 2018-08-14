@extends('../layout')

@section('content')
<h1>Job new</h1>  
<form action="{{ action('JobController@store') }}" method="post" enctype="multipart/form-data">
  @method('post')
  @csrf
  @include('layouts.errors')
  <div class="form-group">
    <label for="Name">Category:</label>
    <select class="form-control" name="category_id">
      @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>     
  </div>
  <div class="form-group">
    <label for="Name">Type:</label>
    <select class="form-control" name="type">
        @foreach ($job->types as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>      
  </div>
  <div class="form-group">    
    <label for="Name">Company:</label>
    <input type="text" class="form-control" name="company" value=""/>    
  </div>
  <div class="form-group">    
    <label for="Name">Logo:</label>
    <input type="file" class="form-control" name="logo" accept="image/png, image/jpeg"/>                 
  </div>
  <div class="form-group">
    <label for="Name">Url:</label>
    <input type="text" class="form-control" name="url" value="" placeholder="https://example.com"/>
  </div>
  <div class="form-group">
    <label for="Name">Position:</label>
    <input type="text" class="form-control" name="position" value=""/>    
  </div>        
  <div class="form-group">
    <label for="Name">Location:</label>
    <input type="text" class="form-control" name="location" value=""/>
  </div>  
  <div class="form-group">    
    <label for="Name">Description:</label>
    <textarea rows="4" cols="50" class="form-control" name="description"></textarea>    
  </div>
  <div class="form-group">    
    <label for="Name">How to apply:</label>
    <textarea rows="4" cols="50" class="form-control" name="how_to_apply"></textarea>   
  </div>
  <div class="form-group form-check">   
    
    <input type="checkbox" class="form-check-input" name="is_public" value="is_public"/>
    <label for="is_public" class="form-check-label">Public (Whether the job can also be published on affiliate websites or not.)</label>    
  </div>
  <div class="form-group">    
    <label for="Name">Email:</label>
    <input type="text" class="form-control" name="email" value="" placeholder="email@example.com"/>   
  </div>
  <div class="form-group">   
    <button type="submit" class="btn btn-success">New</button>   
  </div>  
</form>
@endsection