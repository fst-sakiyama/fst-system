<table class="table mb-0 table-hover">
	<thead>
		<tr class="d-flex">
			<th class="col">作成日</th>
			<th class="col">完了日</th>
			<th class="col-2">案件名</th>
			<th class="col-4">内容</th>
			<th class="col-2">顧客名</th>
		</tr>
	</thead>
	<tbody>
	@foreach($wellKnownsTrash as $item)
		<tr class="d-flex" id = "{{'item_'.$item->takeOverId}}">
			<td class="col"><a class="trashWellKnownTable" data-class = "{{'item_'.$item->takeOverId}}" style="cursor:pointer;">{{ $item->created_at->format('Y.m.d') }}</a></td>
			<td class="col"><a class="trashWellKnownTable" data-class = "{{'item_'.$item->takeOverId}}" style="cursor:pointer;">{{ $item->deleted_at->format('Y.m.d') }}</a></td>
			<td class="col-2"><a class="trashWellKnownTable" data-class = "{{'item_'.$item->takeOverId}}" style="cursor:pointer;">{{ mb_substr($item->project->projectName,0,12) }}</a></td>
			<td class="col-4"><a class="trashWellKnownTable" data-class = "{{'item_'.$item->takeOverId}}" style="cursor:pointer;">{{ mb_substr($item->takeOverContent,0,24) }}@if(mb_strlen($item->takeOverContent)>24)...@endif</a></td>
			<td class="col-2"><a class="trashWellKnownTable" data-class = "{{'item_'.$item->takeOverId}}" style="cursor:pointer;"><span class="small">{{ mb_substr($item->project->client->clientName,0,8) }}</span></td>
		</tr>
	@endforeach
	</tbody>
</table>
