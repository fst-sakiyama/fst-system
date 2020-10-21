@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">

      <livewire:top-information :item=$item>

    </div>
  </div>
</div>

@endsection
