@section('content')
<div class="contents">
  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>@include('components.returnButton')</h1>
      </div>
    </div>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header"><h5>{{ __('Register') }}</h5></div>
                  <div class="card-body">
                      <form method="POST" action="{{ route('user.store') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                  </select>
                              </div>
                          </div>

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
