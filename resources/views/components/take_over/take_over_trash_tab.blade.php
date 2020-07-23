<table class="table mb-0 table-hover">
	<thead>
		<tr class="d-flex">
			<th class="col-1"></th>
			<th class="col">作成日</th>
			<th class="col">完了日</th>
			<th class="col-2">案件名</th>
			<th class="col-4">内容</th>
			<th class="col-2">顧客名</th>
		</tr>
	</thead>
	<tbody>
	@foreach($takeOversTrash as $item)
		<tr class="d-flex" id = "{{'item_'.$item->takeOverId}}">
			<td class="col-1"><a href="{{ route('take_over.restore',['id'=>$item->takeOverId]) }}" class="btn btn-primary btn-sm">戻す</a></td>
			<td class="col"><a class="modaltable" data-toggle="modal" data-target="#modalTable1" data-whatever="{{'item_'.$item->takeOverId}}" data-val="{{ $item->created_at->format('Y.m.d') }}">{{ $item->created_at->format('Y.m.d') }}</a></td>
			<td class="col"><a class="modaltable" data-toggle="modal" data-target="#modalTable1" data-whatever="{{'item_'.$item->takeOverId}}" data-val="{{ $item->takeOverId }}">{{ $item->deleted_at->format('Y.m.d') }}</a></td>
			<td class="col-2"><a class="modaltable" data-toggle="modal" data-target="#modalTable1" data-whatever="{{'item_'.$item->takeOverId}}" data-val="{{ mb_substr($item->project->projectName,0,12) }}">{{ mb_substr($item->project->projectName,0,12) }}</a></td>
			<td class="col-4"><a class="modaltable" data-toggle="modal" data-target="#modalTable1" data-whatever="{{'item_'.$item->takeOverId}}" data-val="{!! nl2br(e($item->takeOverContent)) !!}">{{ mb_substr($item->takeOverContent,0,24) }}@if(mb_strlen($item->takeOverContent)>24)...@endif</a></td>
			<td class="col-2"><a class="modaltable" data-toggle="modal" data-target="#modalTable1" data-whatever="{{'item_'.$item->takeOverId}}" data-val="{{ $item->project->client->clientName }}"><span class="small">{{ mb_substr($item->project->client->clientName,0,8) }}</span></td>
		</tr>
	@endforeach
	</tbody>
</table>

<div class="modal fade" id="modalTable1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="col">
					<div class="card mt-1">
						<div class="card-header modalHeader">

						</div>
						<div class="card-body w-100">
							<img class="img-fluid mx-auto d-block" alt='済' src="{{ asset( 'images/doComp.png' ) }}" width="">
							<div class="card-img-overlay">
								<div class="card-text mt-5">
									<div class="col mt-3 modalBody">

									</div>
								</div>
							</div>
						</div>
						<div class="card-footer" style="position:relative;">
							<div class="container-fluid">
								<div class="row mb-0 justify-content-start">
									<div class="">
										<span class="modalReturn"></span>
										<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
									</div>
								</div>
							</div>
							<div class="row mb-0 mr-1 float-right">
								<div class="small modalFooter">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
