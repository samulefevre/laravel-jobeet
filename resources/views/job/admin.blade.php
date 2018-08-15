<div id="job_actions">
    <h3>Admin</h3>
    <ul>
    @if(!$job->isActivated)
      <li><a href="{{ action('JobController@edit', [$job->token]) }}">Edit</a></li>
      <li>
        <form action="{{ action('JobController@publish', [$job->token]) }}" method="post">        
            @csrf  
          <button type="submit">Publish</button>
        </form>
      </li>
    @endif
    <li>
      <form action="{{ action('JobController@destroy', [$job->token]) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" onclick="if(!confirm('Are you sure?')) { return false; }">Delete</button>
      </form>
    </li>
    @if($job->isActivated)
      <li @if(job.expiresSoon) class="expires_soon" @endif >
        @if ($job->isExpired)
          Expired
        @else
          Expires in <strong>{{ $job->getDaysBeforeExpires }}</strong> days
        @endif
 
        @if($job->expiresSoon)
          <form action="{{ action('JobController@extend', [$job-->token]) }}" method="post">
            @csrf
            <button type="submit">Extend</button> for another 30 days
          </form>
        @endif
      </li>
    @else
      <li>
        [Bookmark this <a href="{{ action('JobController@preview', [$job->token, $job->companyslug, $job->locationslug, $job->positionslug]) }}">URL</a> to manage this job in the future.]
      </li>
    @endif
    </ul>
</div>