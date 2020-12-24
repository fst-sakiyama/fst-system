$('[id^=stop]').on('click',function(){
    var id=$(this).attr('id').replace('stop','');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'live_monitaring_plan/ajax_stop?id=' + id,
        type: 'POST',
        data: { 'id' : id },
    }).done(function (results){
        // 成功したときのコールバック
        $('#line'+id).addClass('decoLine');
        $('#stop'+id).addClass('d-none');
        $('#open'+id).removeClass('d-none');
        $('#imgLabel'+id).addClass('d-none');
        $('#imgStop'+id).removeClass('d-none');
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert(errorThrown);
    });
});

$('[id^=open]').on('click',function(){
    var id=$(this).attr('id').replace('open','');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'live_monitaring_plan/ajax_open?id=' + id,
        type: 'POST',
        data: { 'id' : id },
    }).done(function (results){
        // 成功したときのコールバック
        $('#line'+id).removeClass('decoLine');
        $('#stop'+id).removeClass('d-none');
        $('#open'+id).addClass('d-none');
        $('#imgLabel'+id).removeClass('d-none');
        $('#imgStop'+id).addClass('d-none');
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert(errorThrown);
    });
});
