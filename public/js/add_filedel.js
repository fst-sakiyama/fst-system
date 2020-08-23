$('.filedel').click(function(){
  if(!confirm('本当に削除していいですか？')){
    return false;
  }else{
    var id = $(this).data('id');
    var dispDate = $('form').find('.dispDate').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'filedel?id=' + id,
        type: 'POST',
        data: { 'dispDate' : dispDate },
    }).done(function (results){
        // 成功したときのコールバック
        window.location=results.url;
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert('fail');
    });
  }
})

$('.linkdel').click(function(){
  if(!confirm('本当に削除していいですか？')){
    return false;
  }else{
    var id = $(this).data('id');
    var dispDate = $('form').find('.dispDate').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'linkdel?id=' + id,
        type: 'POST',
        data: { 'dispDate' : dispDate },
    }).done(function (results){
        // 成功したときのコールバック
        window.location=results.url;
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert('fail');
    });
  }
})
