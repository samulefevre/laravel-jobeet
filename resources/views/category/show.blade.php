@extends('../layout')
 
@section('content')
  <div class="category">
    <div class="feed">
      <a href="{{ route('category.show', [$category->slug, 1]) }}">Feed</a>
    </div>
    <h1>{{ $category->name }}</h1>
  </div>
 
  
 
  @if ($page > 1)
    <div class="pagination">
      <a href="{{ route('category.show', [$category->slug, 1 ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/first.png') }}" alt="First page" title="First page" />
      </a>
 
      <a href="{{ route('category.show', [$category->slug, 1 ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/previous.png') }}" alt="Previous page" title="Previous page" />
      </a>
 
      {% for page in 1..last_page %}
        {% if page == current_page %}
          {{ page }}
        {% else %}
          <a href="{{ route('category.show', [$category->slug, $page ]) }}">{{ page }}</a>
        {% endif %}
      {% endfor %}
 
      <a href="{{ route('category.show', [$category->slug, 1 ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/next.png') }}" alt="Next page" title="Next page" />
      </a>
 
      <a href="{{ route('category.show', [$category->slug, 1 ]) }}">
        <img src="{{ asset('bundles/ensjobeet/images/last.png') }}" alt="Last page" title="Last page" />
      </a>
    </div>
  @endif
 
  <div class="pagination_desc">
    <strong></strong> jobs in this category
 
    @if ($page > 1)
      - page <strong>{{ page }}/{{ $page }}</strong>
    @endif
  </div>
  @endsection