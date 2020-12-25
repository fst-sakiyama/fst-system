$('[id^=btn]').on('click',function(){
    var obj = $(this);
    var str = obj.attr('id');
    var id = str.replace('btn','').substr(1);
    var btnId = str.substr(3,1);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'ajax_btnpush?btnId=' + btnId + '&id=' + id,
        type: 'POST',
        data: { 'btnId' : btnId , 'id' : id },
    }).done(function (results){
        // 成功したときのコールバック
        obj.addClass('d-none');
        obj.next('.txt'+btnId).text(results.now);
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert('fail');
    });

});

$('button[id^=abnormal]').on('click',function(){
    var id = $(this).attr('id').replace('abnormal','');
    var now = new Date();
    var org = $('#abnormalBlock'+id+'[name=org]');
    var obj = org.clone(true).insertBefore($('#last'+id));
    obj.removeAttr('name');
    obj.children('.timeStamp').text(('00'+now.getHours()).slice(-2)+':'+('00'+now.getMinutes()).slice(-2));
    obj.removeClass('d-none').hide().slideDown(300);
    obj.children('.textArea').children('textarea').focus();
});

$('.abnormalNote').blur(function(){
    var str = $(this).val();
    if(str){
        $(this).addClass('d-none');
        $(this).next('.conf').text(str);
    }else{
        var obj = $(this).parent('div').parent('[id^=abnormalBlock]');
        obj.slideUp(300).queue(function(){
            obj.remove();
        });
    }
});
