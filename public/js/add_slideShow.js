$('.slideButton').on('click',function(){
    var val = $(this).data('id');
    var str = $(this).html();
    $('.slideBlock'+val).slideToggle();
    if(str ==='ファイルの追加フォームを開く'){
      $(this).html('ファイルの追加フォームを閉じる')
    }else{
      $(this).html('ファイルの追加フォームを開く')      
    }
});
