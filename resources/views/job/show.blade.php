@extends('../layout')

@section('title')
    @if ($job) {{ $job->company }} is looking for a {{ $job->position }} @endif
@endsection

@section('content')
@if ($job)
@if (Request::route('token'))
    @include('job.admin', ['job' => $job])
@endif
<div id="job">
    <h1>{{ $job->company }}</h1>
    <h2>{{ $job->location }}</h2>
    <h3>
    {{ $job->position }}
    <small> - {{ $job->type }}</small>
    </h3>

    @if ($job->logo)
    <div class="logo">
        <a href="https://{{ $job->url }}">
        <img src="{{ asset('storage/'.$job->logo) }}"
            alt="{{ $job->company }} logo" class="company-logo" />
        </a>
    </div>
    @endif

    <div class="description">
    {{ $job->description }}
    </div>

    <h4>How to apply?</h4>

    <p class="how_to_apply">{{ $job->how_to_apply }}</p>

    <div class="meta">
    <small>posted on {{ $job->created_at->toFormattedDateString() }}</small>
    </div>
    
</div>
@else
    <div class="error"><p>This page no longer exist.</p></div>
@endif
@endsection