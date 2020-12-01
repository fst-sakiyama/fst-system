@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnLinkButton',['item'=>'/paid_leave'])</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col h5">
                    有給取得確認
                </div>
            </div>
        </div>

        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th>集計</th>
                    <th>名前</th>
                    <th>有給付与日</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    @if($item->role != '1')
                    <tr>

                        <livewire:paid-leave-set :item=$item>

                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

@endsection
