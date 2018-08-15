<div id="jobs">
    <table class="jobs">
    @foreach ($jobs as $job)
        <tr class="">
        <td class="location">{{ $job->location }}</td>
        <td class="position">
            <a href="{{ route('job.show', ['id' => $job->id, 'company' => $job->companySlug, 'location' => $job->locationSlug, 'position' => $job->positionSlug]) }}">
            {{ $job->position }}
            </a>
        </td>
        <td class="company">{{ $job->company }}</td>
        </tr>
    @endforeach
    </table>
</div>