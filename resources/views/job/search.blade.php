@extends('../layout')

@section('content')
<div id="jobs">
    @include('job.list', ['jobs' => $jobs])
    @if ($query)
        {{ $jobs->appends(['query' => $query])->links() }}
    @else
        {{ $jobs->appends(['query' => ''])->links() }}
    @endif
</div>
@endsection