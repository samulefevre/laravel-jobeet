<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Jobeet - Your best job board')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" media="all" />    
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />	
  </head>
  <body>
    <div id="container">
      <div id="header">
        <div class="content">
          <h1><a href="/">
            <img src="{{ asset('/images/logo.jpg') }}" alt="Jobeet Job Board" />
          </a></h1>
 
          <div id="sub_header">
            <div class="post">
              <h2>Ask for people</h2>
              <div>
                <a href="{{ route('job.create') }}">Post a Job</a>
              </div>
            </div>
 
            <div class="search">
              <h2>Ask for a job</h2>
              <form action="{{ action('JobController@search') }}" method="get">              
                <input type="text" name="query" id="search_keywords" />
                <input type="submit" value="search" />
                <div class="help">
                  Enter some keywords (city, country, position, ...)
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      

      <div id="content">        
     
        <div class="content">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
        </div>
      </div>
 
      <div id="footer">
        <div class="content">
          <span class="symfony">
            <img src="{{ asset('/images/jobeet-mini.png') }}" />
            powered by <a href="https:/laravel.com/" target="_blank">
              <img src="{{ asset('/images/laravel-logo.png') }}" class="laravel-logo" alt="symfony framework" />
            </a>
          </span>
          <ul>
            <li><a href="">About Jobeet</a></li>
            <li class="feed"><a href="{{ route('job.index', ['_format' => 'atom']) }}">Full feed</a></li>
            <li><a href="">Jobeet API</a></li>
            <li class="last"><a href="">Affiliates</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>