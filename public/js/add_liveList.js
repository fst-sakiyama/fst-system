$('[id^=btn]').on('click',function(){
    var obj = $(this);
    var str = obj.attr('id');
    var id = str.replace('btn','').substr(1);
    var regId = '';
    if(id.indexOf('Reg') > -1){
        regId = id.replace('Reg','');
    }
    var btnId = str.substr(3,1);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'ajax_btnpush?btnId=' + btnId + '&regId=' + regId + '&id=' + id,
        type: 'POST',
        data: { 'btnId' : btnId , 'regId' : regId , 'id' : id },
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
    var thisObj = $(this);
    var obj = $(this).parent('div').parent('[id^=abnormalBlock]');
    if(str){
        var id = obj.attr('id').replace('abnormalBlock','');
        var regId = '';
        if(id.indexOf('Reg') > -1){
            regId = id.replace('Reg','');
        }
        var ts = obj.children('.timeStamp').text();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'ajax_abnormalblur',
            type: 'POST',
            data: { 'str' : str , 'ts' : ts , 'regId' : regId , 'id' : id },
        }).done(function (results){
            // 成功したときのコールバック
            thisObj.addClass('d-none');
            thisObj.next('.conf').text(str);
        }).fail(function(jqXHR, textStatus, errorThrown){
            // 失敗したときのコールバック
            alert('fail');
        });

    }else{
        obj.slideUp(300).queue(function(){
            obj.remove();
        });
    }
});

$('[id^=edit]').on('click',function(){
    var id = $(this).attr('id').replace('edit','');
    var regId = '';
    if(id.indexOf('Reg') > -1){
        regId = id.replace('Reg','');
    }
    var str = '';
    $('.btn'+id).each(function(){
        if(!$(this).text()){
            str = '全項目の入力が終わっているか確認してください。';
            return false;
        }
    });

    if(str){
        alert(str);
        return false;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'ajax_liveend',
        type: 'POST',
        data: { 'regId' : regId , 'id' : id },
    }).done(function (results){
        // 成功したときのコールバック
        $('#card'+id).fadeOut(function(){$(this).addClass('d-none'),800});
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert('fail');
    });

});
