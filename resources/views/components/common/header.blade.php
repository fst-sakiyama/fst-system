@section('header')

<!--
  navbar-fixed-topが機能しない？？
-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#ff1493;">
  <div class="container">
    <a class="navbar-brand" href="{{asset('/wedding_ring')}}">フェイス・ソリューション・テクノロジーズ株式会社</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav mr-auto">

      </ul>

      <ul class="navbar-nav">

          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  メニュー<span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{asset('/classes')}}">分類一覧ページ</a>
                <a class="dropdown-item" href="{{asset('/subjects')}}">件名一覧ページ</a>
                <a class="dropdown-item" href="{{asset('/basic_data')}}">基本情報一覧ページ</a>
                <a class="dropdown-item" href="{{asset('/answers')}}">回答集一覧ページ</a>
                <div class="dropdown-divider"></div>

              </div>
          </li>

      </ul>

    </div>
  </div>
</nav>

@endsection
