@section('content')

@if (session('flashMessage'))
	@php
		echo "<script type='text/javascript'>alert('".session('flashMessage')."');</script>";
	@endphp
@endif

@php
	$now = date("Y/m/d");
	$cntNowProgress = count($nowProgress);
	$cntMakePlans = count($makePlans);
	$cntDoCompletes = count($doCompletes);
	$cntTrashPlans = count($trashPlans);
@endphp

<div class="contents">
	<div class="container">
		<div class="row">
			<div class="col mt-3">
	    	<h1 class="text-center">{{$now}}　進行状況</h1>
			</div>
			<div class="col text-right mt-3 mr-5">
				<a href="{{asset('/dev_confirm/add')}}"><button type="button" class="w-50 btn btn-primary">課題 | 新規登録</button></a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col mt-3">
			<div class="card">
				<div class="card-header">
					<h3>現在進行中の作業</h3>
				</div>
				<table class="table mb-0 table-hover">
					<thead>
						<tr class="d-flex">
							<th class="col-1">No</th>
							<th class="col-4">進行中の作業</th>
							<th class="col-1">子課題</th>
							<th class="col-1">残課題</th>
							<th class="col-1">済課題</th>
							<th class="col-2">作業開始日</th>
							<th class="col-1">終了</th>
							<th class="col-1">中止</th>
						</tr>
					</thead>
					<tbody>
					@foreach($nowProgress as $item)
						<tr class="d-flex">
							<td class="col-1">{{ $item->fstSystemProgressId }}</td>
							<td class="col-4"><a href="{{ route('progress_detail.index',['id'=>$item->fstSystemProgressId]) }}">{{ $item->fstSystemPlan }}</a></td>
							<td class="col-1">{{ $item->progressDetails()->count() }}</td>
							<td class="col-1">{{ $item->progressDetails()->whereNull('doComp')->count() }}</td>
							<td class="col-1">{{ $item->progressDetails()->whereNotNull('doComp')->count() }}</td>
							<td class="col-2">{{ $item->planComp }}</td>
							<td class="col-1"><a href="{{ route('dev_confirm.editDoComp',['id'=>$item->fstSystemProgressId]) }}" class="btn btn-success btn-sm">終了</a></td>
              <td class="col-1">
                <form action="{{ route('dev_confirm.editDelete', ['id'=>$item->fstSystemProgressId]) }}" id="form_{{ $item->fstSystemProgressId }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <a href="#" data-id="{{ $item->fstSystemProgressId }}" class="btn btn-danger btn-sm deleteConf">中止</a>
                </form>
              </td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="card-footer text-right">
					<small class="text-mute">現在進行中の作業 {{ $cntNowProgress }} 件</small>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col mt-3">
			<div class="card">
				<div class="card-header">
					<h3>今後行われる作業</h3>
				</div>
				<table class="table mb-0 table-hover">
					<thead>
						<tr class="d-flex">
							<th class="col-1">No</th>
							<th class="col-4">今後行われる作業</th>
							<th class="col-1">子課題</th>
							<th class="col-1">残課題</th>
							<th class="col-1">済課題</th>
							<th class="col-2">作業設定日</th>
							<th class="col-1">開始</th>
							<th class="col-1">中止</th>
						</tr>
					</thead>
					<tbody>
					@foreach($makePlans as $item)
						<tr class="d-flex">
							<td class="col-1">{{ $item->fstSystemProgressId }}</td>
							<td class="col-4"><a href="{{ route('progress_detail.index',['id'=>$item->fstSystemProgressId]) }}">{{ $item->fstSystemPlan }}</a></td>
							<td class="col-1">{{ $item->progressDetails()->count() }}</td>
							<td class="col-1">{{ $item->progressDetails()->whereNull('doComp')->count() }}</td>
							<td class="col-1">{{ $item->progressDetails()->whereNotNull('doComp')->count() }}</td>
							<td class="col-2">{{ $item->created_at }}</td>
							<td class="col-1"><a href="{{ route('dev_confirm.editPlanComp',['id'=>$item->fstSystemProgressId]) }}" class="btn btn-success btn-sm">開始</a></td>
              <td class="col-1">
                <form action="{{ route('dev_confirm.editDelete', ['id'=>$item->fstSystemProgressId]) }}" id="form_{{ $item->fstSystemProgressId }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <a href="#" data-id="{{ $item->fstSystemProgressId }}" class="btn btn-danger btn-sm deleteConf">中止</a>
                </form>
              </td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="card-footer text-right">
					<small class="text-mute">今後行われる作業 {{ $cntMakePlans }} 件</small>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col mt-3">
			<div class="card">
				<div class="card-header">
					<h3>終了した作業</h3>
				</div>
				<table class="table mb-0 table-hover">
					<thead>
						<tr class="d-flex">
							<th class="col-1">No</th>
							<th class="col-4">終了した作業</th>
							<th class="col-1">子課題</th>
							<th class="col-1">残課題</th>
							<th class="col-1">済課題</th>
							<th class="col-2">作業完了日</th>
						</tr>
					</thead>
					<tbody>
					@foreach($doCompletes as $item)
						<tr class="d-flex">
							<td class="col-1">{{ $item->fstSystemProgressId }}</td>
							<td class="col-4"><a href="{{ route('progress_detail.index',['id'=>$item->fstSystemProgressId]) }}">{{ $item->fstSystemPlan }}</a></td>
							<td class="col-1">{{ $item->progressDetails()->count() }}</td>
							<td class="col-1">{{ $item->progressDetails()->whereNull('doComp')->count() }}</td>
							<td class="col-1">{{ $item->progressDetails()->whereNotNull('doComp')->count() }}</td>
							<td class="col-2">{{ $item->doComp }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="card-footer d-flex justify-content-center align-middle">
					{{ $doCompletes->links() }}
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col mt-3">
			<div class="card">
				<div class="card-header">
					<h3>中止された作業</h3>
				</div>
				<table class="table mb-0 table-hover">
					<thead>
						<tr class="d-flex">
							<th class="col-1">No</th>
							<th class="col-6">中止された作業</th>
							<th class="col-3">削除日</th>
							<th class="col-1">戻す</th>
						</tr>
					</thead>
					<tbody>
					@foreach($trashPlans as $item)
						<tr class="d-flex">
							<td class="col-1">{{ $item->fstSystemProgressId }}</td>
							<td class="col-6">{{ $item->fstSystemPlan }}</td>
							<td class="col-3">{{ $item->deleted_at }}</td>
							<td class="col-1"><a href="{{ route('dev_confirm.restore',['id'=>$item->fstSystemProgressId]) }}" class="btn btn-success btn-sm">戻す</a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="card-footer text-right">
					<small class="text-mute">中止された作業 {{ $cntTrashPlans }} 件</small>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
