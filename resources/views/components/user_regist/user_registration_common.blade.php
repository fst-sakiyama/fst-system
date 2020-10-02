@section('content')
<div class="contents">
  <div class="container container-top">
    <div class="row">
      <div class="col">
        <h1>@include('components.returnLinkButton',['item'=>'/user_regist'])</h1>
      </div>
    </div>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header"><h5>{{ __('Register') }}</h5></div>
                  <div class="card-body">
                      <form method="POST" action="@if($item){{ route('user.update',$item->id) }}@else{{ route('user.store') }}@endif">
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if($item){{$item->name}}@else{{ old('name') }}@endif" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if($item){{$item->email}}@else{{ old('email') }}@endif" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                              <div class="col-md-6">
                                  <select id='role' name="role" class="form-control">
                                    @if($item)
                                      @can('system-only')
                                        <option value=1 @if($item->role=='1') selected @endif>開発者</option>
                                        <!-- <option value=2 @if($item->role=='2') selected @endif></option> -->
                                        <option value=3 @if($item->role=='3') selected @endif>管理者</option>
                                        <!-- <option value=4 @if($item->role=='4') selected @endif></option> -->
                                      @endcan
                                      @can('admin-higher')
                                        <!-- <option value=5 @if($item->role=='5') selected @endif></option>
                                        <option value=6 @if($item->role=='6') selected @endif></option>
                                        <option value=7 @if($item->role=='7') selected @endif></option>
                                        <option value=8 @if($item->role=='8') selected @endif></option>
                                        <option value=9 @if($item->role=='9') selected @endif></option>
                                        <option value=10 @if($item->role=='10') selected @endif></option> -->
                                        <option value=11 @if($item->role=='11') selected @endif>経理チーム</option>
                                        <!-- <option value=12 @if($item->role=='12') selected @endif></option> -->
                                        <option value=13 @if($item->role=='13') selected @endif>営業チーム</option>
                                        <!-- <option value=14 @if($item->role=='14') selected @endif></option> -->
                                        <option value=15 @if($item->role=='15') selected @endif>開発チーム</option>
                                        <!-- <option value=16 @if($item->role=='16') selected @endif></option> -->
                                        <option value=17 @if($item->role=='17') selected @endif>運用チーム</option>
                                        <!-- <option value=18 @if($item->role=='18') selected @endif></option>
                                        <option value=19 @if($item->role=='19') selected @endif></option> -->
                                        <option value=20 @if($item->role=='20') selected @endif>ユーザー</option>
                                      @endcan
                                    @else
                                      @can('system-only')
                                        <option value=1 @if(old('role')=='1') selected @endif>開発者</option>
                                        <!-- <option value=2 @if(old('role')=='2') selected @endif></option> -->
                                        <option value=3 @if(old('role')=='3') selected @endif>管理者</option>
                                        <!-- <option value=4 @if(old('role')=='4') selected @endif></option> -->
                                      @endcan
                                      @can('admin-higher')
                                        <!-- <option value=5 @if(old('role')=='5') selected @endif></option>
                                        <option value=6 @if(old('role')=='6') selected @endif></option>
                                        <option value=7 @if(old('role')=='7') selected @endif></option>
                                        <option value=8 @if(old('role')=='8') selected @endif></option>
                                        <option value=9 @if(old('role')=='9') selected @endif></option>
                                        <option value=10 @if(old('role')=='10') selected @endif></option> -->
                                        <option value=11 @if(old('role')=='11') selected @endif>経理チーム</option>
                                        <!-- <option value=12 @if(old('role')=='12') selected @endif></option> -->
                                        <option value=13 @if(old('role')=='13') selected @endif>営業チーム</option>
                                        <!-- <option value=14 @if(old('role')=='14') selected @endif></option> -->
                                        <option value=15 @if(old('role')=='15') selected @endif>開発チーム</option>
                                        <!-- <option value=16 @if(old('role')=='16') selected @endif></option> -->
                                        <option value=17 @if(old('role')=='17') selected @endif>運用チーム</option>
                                        <!-- <option value=18 @if(old('role')=='18') selected @endif></option>
                                        <option value=19 @if(old('role')=='19') selected @endif></option> -->
                                        <option value=20 @if(empty(old('role')) || old('role')=='20') selected @endif>ユーザー</option>
                                      @endcan
                                    @endif
                                  </select>
                              </div>
                          </div>

                          @if(!($item))
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div>
                          @endif

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Register') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
