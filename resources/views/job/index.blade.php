@extends('../layout')

@section('content')
<div id="jobs">
    @foreach ($categories as $category)
      <div class="category_{{ $category->slug }}">
        <div class="category">
          <div class="feed">
            <a href="{{ route('category.show', [$category->slug, '1']) }}">Feed</a>
          </div>
          <h1><a href="{{ route('category.show', [$category->slug, '1']) }}">{{ $category->name }}</a></h1>
        </div>        
        @include('job.list', ['jobs' => $category->activeJobs])
 
        @if ($category->name)
            <div class="more_jobs">
              and <a href="{{ route('category.show', [$category->slug, '1']) }}">{{ $category->moreJobs }}</a>
              more...
            </div>
        @endif
      </div>
    @endforeach
  </div>
@endsection