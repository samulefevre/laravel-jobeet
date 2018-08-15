{{ Request::header('Content-Type : application/xml') }}

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>

<title>{{ config('app.name') }}</title>
<description>RSS Feed</description>
<link>{{ url('/') }}</link>

@foreach ($category->activeJobs as $job)
<item>
    <title>{{ $job->position }} ( {{ $job->location }} )</title>
    <description>{{ $job->description }}</description>
    <pubDate>{{ $job->created_at->toFormattedDateString() }}</pubDate>
    <link>{{ route('job.show', ['id' => $job->id, 'company' => $job->companySlug, 'location' => $job->locationSlug, 'position' => $job->positionSlug]) }}</link>
    <guid>{{ route('job.show', ['id' => $job->id, 'company' => $job->companySlug, 'location' => $job->locationSlug, 'position' => $job->positionSlug]) }}</guid>
    <atom:link href="{{ route('job.show', ['id' => $job->id, 'company' => $job->companySlug, 'location' => $job->locationSlug, 'position' => $job->positionSlug]) }}" rel="self" type="application/rss+xml"/>      
</item>
@endforeach

</channel>
</rss>