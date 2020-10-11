@section('content')

@if (session('flashMessage'))
	@php
		echo "<script type='text/javascript'>alert('".session('flashMessage')."');</script>";
	@endphp
@endif

<div class="contents">
	<div class="container">
		<div class="col mt-3">
			<div class="card">
				<div class="card-header">
					<h3>【削除済み】ファイル一覧</h3>
				</div>
				<table class="table mb-0 table-hover">
					<thead>
						<tr class="d-flex">
							<th class="col-2">案件名</th>
							<th class="col-1">分類</th>
							<th class="col-3">ファイル名</th>
							<th class="col-2">作成日</th>
							<th class="col-2">削除日</th>
							<th class="col-1">戻す</th>
							<th class="col-1">完全削除</th>
						</tr>
					</thead>
					<tbody>
					@foreach($filePosts as $item)
						<tr class="d-flex">
							<td class="col-2">{{ $item->project->projectName }}</td>
							<td class="col-1">{{ $item->fileClassification->fileClassification }}</td>
							<td class="col-3"><a href="{{ asset('/file_show?id=') }}{{ $item->filePostId }}" target="_blank" rel="noopener noreferrer">{{ $item->fileName }}</td>
							<td class="col-2">{{ $item->created_at->format('Y年m月d日') }}</td>
							<td class="col-2">{{ $item->deleted_at->format('Y年m月d日') }}</td>
							<td class="col-1"><a href="{{ route('file_posts.restore',['id'=>$item->filePostId]) }}" class="btn btn-success btn-sm">戻す</a></td>
              <td class="col-1">
                {{Form::open(['route'=>['file_posts.destroy',$item->filePostId],'method'=>'DELETE','id'=>'form_'.$item->filePostId])}}
                {{Form::submit('削除',['class' => 'btn btn-danger btn-sm','data-id'=>$item->takeOverId,'onclick'=>"return confirm('本当に削除して良いですか？')"])}}
                {{Form::close()}}
              </td>
						</tr>
					@endforeach
					</tbody>
				</table>
        <div class="card-footer d-flex justify-content-center align-middle">
					{{ $filePosts->onEachSide(2)->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>

		<div class="col mt-3">
			<div class="card">
				<div class="card-header">
					<h3>【削除済み】追加ファイル一覧（引き継ぎ）</h3>
				</div>
				<table class="table mb-0 table-hover">
					<thead>
						<tr class="d-flex">
							<th class="col-2">案件名</th>
							<th class="col-1">分類</th>
							<th class="col-3">ファイル名</th>
							<th class="col-2">作成日</th>
							<th class="col-2">削除日</th>
							<th class="col-1">戻す</th>
							<th class="col-1">完全削除</th>
						</tr>
					</thead>
					<tbody>
					@foreach($addFilePosts as $item)
						<tr class="d-flex">
							<td class="col-2">{{ $item->project->projectName }}</td>
							<td class="col-1">-</td>
							<td class="col-3"><a href="{{ asset('/file_addShow?id=') }}{{ $item->addFilePostId }}" target="_blank" rel="noopener noreferrer">{{ $item->fileName }}</td>
							<td class="col-2">{{ $item->created_at->format('Y年m月d日') }}</td>
							<td class="col-2">{{ $item->deleted_at->format('Y年m月d日') }}</td>
							<td class="col-1"><a href="{{ route('add_file_posts.restore',['id'=>$item->addFilePostId]) }}" class="btn btn-success btn-sm">戻す</a></td>
							<td class="col-1">
								{{Form::open(['route'=>['add_file_posts.destroy',$item->addFilePostId],'method'=>'DELETE','id'=>'form_'.$item->addFilePostId])}}
								{{Form::submit('削除',['class' => 'btn btn-danger btn-sm','data-id'=>$item->addTakeOverId,'onclick'=>"return confirm('本当に削除して良いですか？')"])}}
								{{Form::close()}}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="card-footer d-flex justify-content-center align-middle">
					{{ $filePosts->onEachSide(2)->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
