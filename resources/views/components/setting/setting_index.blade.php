@section('content')
<div class="container container-top">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('UserInfo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group mb-3" style="max-width:400px; margin:auto;">
                      <a href="{{ route('name.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                          <dt>{{ __('Name') }}</dt>
                          <dd class="mb-0">{{ $auth->name }}</dd>
                        </dl>
                        <div><i class="fas fa-chevron-right"></i></div>
                      </a>

                      <a href="{{ route('email.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                          <dt>{{ __('E-Mail Address') }}</dt>
                          <dd class="mb-0">{{ $auth->email }}</dd>
                        </dl>
                        <div><i class="fas fa-chevron-right"></i></div>
                      </a>

                      <a href="{{ route('password.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                          <dt>{{ __('Password') }}</dt>
                          <dd class="mb-0">********</dd>
                        </dl>
                        <div><i class="fas fa-chevron-right"></i></div>
                      </a>
                </div>
                <div class="list-group" style="max-width:400px; margin:auto;">
                    <a href="{{ route('deactive.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                      <div>{{ __('Deactive') }}</div>
                      <div><i class="fas fa-chevron-right"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
