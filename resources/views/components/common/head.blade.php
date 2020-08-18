@section('head')
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">

<!--CSS
<link rel="stylesheet" type ="text/css" href="{{asset('/css/app.css')}}">
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/css/style.css')}}">

@yield('pageCss')

@endsection
