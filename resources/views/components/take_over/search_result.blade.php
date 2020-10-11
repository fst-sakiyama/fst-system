@section('content')

<div class="contents">
  <div class="container container-top">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>検索結果</h1>
        </div>
        <div class="row mt-2 mb-2 searchItemClose">
          @foreach($items as $item)
          <div class="col-sm-4 searchItem search_item_{{$item->takeOverId}}" style="display:none;">
            <div class="card mt-1">
              @include('components.take_over.temp_search_card',['item'=>$item])
            </div>
          </div>
            @foreach($item->takeOverTheOperations()->get() as $addItem)
            <div class="col-sm-4 searchItem search_item_{{$item->takeOverId}}" style="display:none;">
              <div class="card mt-1">
              @include('components.take_over.temp_add_search_card',['item'=>$addItem])
              </div>
            </div>
            @endforeach
          @endforeach
        </div>
        @include('components.take_over.search_table',['items'=>$items])
      </div>
      <div class="card-footer d-flex justify-content-center align-middle">
            {{ $items->onEachSide(2)->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@endsection
