@extends('../layout')

@section('content')
<div id="jobs">
    @include('job.list', ['jobs' => $jobs])
    {{ $jobs->links() }}
</div>
@endsection