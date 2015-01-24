<html lang="en">
  <head>
    <meta charset="utf-8">
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    @yield('scriptscss')
    <title>@yield('title')</title>
  </head>
  <body>
    @yield('content')
    {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
    {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') }}
    @yield('scriptsjs')
  </body>
</html>