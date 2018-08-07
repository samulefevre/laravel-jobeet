@extends('../layout')

@section('content')
<div id="jobs">
    <table class="jobs">
    @foreach ($jobs as $job)
        <tr class="">
        <td class="location">{{ $job->location }}</td>
        <td class="position">
            <a href="">
            {{ $job->position }}
            </a>
        </td>
        <td class="company">{{ $job->company }}</td>
        </tr>
    @endforeach
    </table>
</div>
@endsection