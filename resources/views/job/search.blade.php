@extends('../layout')

@section('content')
<div id="jobs">
    @include('job.list', ['jobs' => $jobs]) 
</div>
@endsection