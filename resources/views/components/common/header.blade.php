@section('header')

@php
  $dispDate = new Carbon\Carbon(now());
  $user = Auth::user();
@endphp
<!--
  navbar-fixed-topが機能しない？？
-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#87ceeb;">
  <div class="container">
    <a class="navbar-brand" href="{{asset('/system_top')}}">フェイス・ソリューション・テクノロジーズ株式会社</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav mr-auto">

      </ul>

      <ul class="navbar-nav">

          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ $user->name.'（'.$user->master_role->roleName.'）' }}さん<span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('work_table.index') }}">勤務表</a>
                  <a class="dropdown-item" href="{{ route('work_load.index') }}">工数表</a>
                  <a class="dropdown-item" href="{{ route('shift_table.index') }}">シフト表</a>
                @can('ope-only')
                  <a class="dropdown-item" href="{{asset('/take_over?dispDate=')}}{{$dispDate->timestamp}}">監視引継ぎページ</a>
                  <a class="dropdown-item" href="{{asset('/live_monitaring_plan')}}">ライブ予定確認ページ</a>
                @endcan
                <a class="dropdown-item" href="{{asset('/master_clients')}}">顧客一覧ページ</a>
                <a class="dropdown-item" href="{{asset('/master_projects')}}">案件一覧ページ</a>
                <!-- <a class="dropdown-item" href="">継続案件一覧ページ</a>
                <a class="dropdown-item" href="">入札案件一覧ページ</a>
                <a class="dropdown-item" href="">短期案件一覧ページ</a> -->
                @can('admin-higher')
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('user.index') }}">ユーザー一覧</a>
                  <a class="dropdown-item" href="{{ route('master_shifts.index') }}">シフト一覧</a>
                  <a class="dropdown-item" href="{{ route('paid_leave.index') }}">有給取得確認</a>
                @endcan
                @can('system-only')
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{asset('/dummy')}}/{{date("Y")}}/{{date("m")}}">テスト用ダミーページ</a>
                  <!-- <a class="dropdown-item" href="{{route('calendar.show')}}">テストカレンダー</a> -->
                  <a class="dropdown-item" href="{{asset('/dev_deleted_items')}}">開発者用削除アイテム確認</a>
                  <a class="dropdown-item" href="{{asset('/dev_confirm')}}">開発者用進捗確認ページ</a>
                @endcan
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('change_password.index') }}">
                  {{ __('Change Password') }}
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('study_session.index') }}">勉強会用ページ</a>
              </div>
          </li>

      </ul>

    </div>
  </div>
</nav>

@endsection
