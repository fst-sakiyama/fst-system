$('#sort-able').sortable({
    // 並び替えた後にイベント発生
    update: function(event, ui){
        // 並び替えた順番を返す
        var items = $(this).sortable("toArray");

        $(function(){
          $('tbody.tr').each(function(i){
            $(this).attr('class','number'+(i+1));
          });
        });
        // $.ajax({
        //   headers:{
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   },
        //   url:'./user_regist/order_of_row',
        //   type:'POST',
        //   data: (JSON.stringify(items)),
        //   // dataType:"json",
        // }).done(function(results) {
        //   alert("成功");
        // }).fail(function(jqXHR, textStatus, errorThrown){
        //   alert("失敗");
        // }).always(function(){
        //   alert(JSON.stringify(items));
        // });
　　　　　// hiddenタグ
// 　　     var new_id = document.getElementById('new_id');
        // hiddenのvalueに順番を入れる
        // new_id.value = updated;
    }
})
