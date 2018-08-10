@extends('../layout')
 
@section('content')
  <div class="category">
    <div class="feed">
      <a href="{{ route('category.show', [$category->slug, 1]) }}">Feed</a>
    </div>
    <h1>{{ $category->name }}</h1>
  </div>
 
  @include('job.list', ['jobs' => $category->activeJobs])
 
  @if ($last_page > 1)
    <div class="pagination">
      <a href="{{ route('category.show', [$category->slug, 1 ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/first.png') }}" alt="First page" title="First page" />
      </a>
 
      <a href="{{ route('category.show', [$category->slug, $previous_page ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/previous.png') }}" alt="Previous page" title="Previous page" />
      </a>

      
 
      @for ($i = 0; $i < $last_page; $i++)
        @if ($i == $current_page)
          {{ $i }}
        @else
          <a href="{{ route('category.show', [$category->slug, $i ]) }}">{{ $i }}</a>
        @endif
      @endfor
 
      <a href="{{ route('category.show', [$category->slug, $next_page ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/next.png') }}" alt="Next page" title="Next page" />
      </a>
 
      <a href="{{ route('category.show', [$category->slug, $last_page ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/last.png') }}" alt="Last page" title="Last page" />
      </a>
    </div>
  @endif
 
  <div class="pagination_desc">
    <strong></strong> jobs in this category
 
    @if ($last_page > 1)
      - page <strong>{{ $current_page }}/{{ $last_page }}</strong>
    @endif
  </div>
  @endsection