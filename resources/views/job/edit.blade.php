@extends('../layout')

@section('content')
<h1>Job edit</h1>
  <form action="{{ route('job.edit', [$job->id]) }}" method="post">
    @method('put')
    @csrf
  </form>
@endsection