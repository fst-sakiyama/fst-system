$('.add').on('click',function(){
    $(this).parent().clone(true).insertAfter($(this).parent()).hide().slideDown(300);
});

$('.del').on('click',function(){
    var target=$(this).parent();
    if(target.parent().children().length > 1){
        // target.remove();
        target.slideUp(300).queue(function(){
            target.remove();
        });
    }
});

$('#regLiveSubmit').on('click',function(){
    // バリデーションチェック
    var liveName = $('#liveName').val();
    var forHolidays = $('#forHolidays').val();
    var str = '';

    if(!liveName){
        str = 'ライブ名の入力は必須です。';
    }
    if(!forHolidays){
        str = '祝日だった場合の対応を選択してください。';
    }

    if(str){ //エラーがある場合
        $('#message').text(str);
        $('#messageBlock').fadeIn(500).removeClass('d-none');
        return false;
    }

    $(this).submit();
    // $(this).css('pointer-events','none');
})
