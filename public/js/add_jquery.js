$('.deleteConf').click(function(){
    if(!confirm('本当に削除していいですか？')){
        /* キャンセルの時の処理 */
        return false;
    }else{
        /*　OKの時の処理 */
        var num=$(this).data('id');
        $('#form_' + num).submit();
    }
});
