<DOCTYPE HTML>
<html lang="ja">

<head>

@yield('head')

</head>

<body class="d-flex flex-column" style="min-height: 100vh">

@yield('header')

<div style="padding-top: 50px">
@yield('content')
</div>

<div style="padding-top: 50px">
@yield('footer')
</div>

</body>
</html>
