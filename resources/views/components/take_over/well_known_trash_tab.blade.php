<table class="table mb-0 table-hover w-100">
	<thead>
		<tr>
			<th class="col-2">作成日</th>
			<th class="col-3">案件名</th>
			<th class="col-5">内容</th>
			<th class="col-2">顧客名</th>
		</tr>
	</thead>
	<tbody>
	@foreach($wellKnownsTrash as $item)
		<tr>
			<td class="col-2">{{ $item->created_at->format('Y.m.d') }}</td>
			<td class="col-3">{{ $item->project->projectName }}</td>
			<td class="col-5">{{ $item->takeOverContent }}</td>
			<td class="col-2">{{ $item->project->client->clientName }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
