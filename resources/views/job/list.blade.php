<div id="jobs">
    <table class="jobs">
    @foreach ($jobs as $job)
        <tr class="">
        <td class="location">{{ $job->location }}</td>
        <td class="position">
            <a href="{{ route('job.show', [$job->id, str_slug($job->company), str_slug($job->location), str_slug($job->position)]) }}">
            {{ $job->position }}
            </a>
        </td>
        <td class="company">{{ $job->company }}</td>
        </tr>
    @endforeach
    </table>
</div>