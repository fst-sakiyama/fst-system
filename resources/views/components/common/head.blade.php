@section('head')
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">

<!--CSS -->
<link rel="stylesheet" type ="text/css" href="{{asset('/css/app.css')}}">

@yield('pageCss')

@endsection
