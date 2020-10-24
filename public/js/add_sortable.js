$('#sort-able').sortable({
    // 並び替えた後にイベント発生
    update: function(event, ui){
        // 並び替えた順番を返す
        var items = $(this).sortable("toArray");

        $.ajax({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:'/user_regist/order_of_row',
          type:'POST',
          data: {items:items},
          // dataType:"json",
          success:function(data){

          }
        });
    }
})
