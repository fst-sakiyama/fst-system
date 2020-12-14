<div>
    <table class="table table-sm table-hover" style="width:20%;">
        <thead>
            <tr>
                <th>姓</th>
                <th>名</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->firstName}}</td>
                <td>{{$item->lastName}}</td>
                <td><button class="btn btn-danger btn-sm p-0" wire:click="delUser({{$item->id}})">削除</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
