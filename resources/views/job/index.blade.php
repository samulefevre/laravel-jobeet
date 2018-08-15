@extends('../layout')

@section('content')
<div id="jobs">
    @foreach ($categories as $category)
      <div class="category_{{ $category->slug }}">
        <div class="category">
          <div class="feed">
            <a href="{{ route('category.show', ['id' => $category->id, 'slug' => $category->slug, '_format' => 'atom']) }}">Feed</a>
          </div>
          <h1><a href="{{ route('category.show', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a></h1>
        </div>        
        @include('job.list', ['jobs' => $category->activeJobs])
 
        @if ($category->name)
            <div class="more_jobs">
              and <a href="{{ route('category.show', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->activeJobs->total() - $max_jobs_on_homepage }}</a>
              more...
            </div>
        @endif
      </div>
    @endforeach
  </div>
@endsection