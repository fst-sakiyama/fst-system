$(document).ready(function(){

    $('[id^=dispPaidLeave]').on('change',function(){
        var id=$(this).attr('id').replace('dispPaidLeave','');
        var contents=$(this).prop('checked') + 0;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'ajax_change?id=' + id,
            type: 'POST',
            data: { 'id' : id , 'dispPaidLeave' : contents },
        }).done(function (results){
            // 成功したときのコールバック
        }).fail(function(jqXHR, textStatus, errorThrown){
            // 失敗したときのコールバック
            alert('fail');
        });
    });

    $('[id^=grantDate]').on('blur',function(){
        var id=$(this).attr('id').replace('grantDate','');
        return setTimeout(function(){
            cancel(id);
            if($('#correct'+id).hasClass('d-none')){
                return toggleGrantDate(id);
            }
            return false;
        },200);
    });

    $('[id^=correct]').on('click',function(){
        var id=$(this).attr('id').replace('correct','');
        toggleGrantDate(id);
        $('#grantDate'+id).focus();
        return false;
    });

    $('[id^=edit]').on('click',function(){
        var id=$(this).attr('id').replace('edit','');
        var contents=$.trim($('#grantDate'+id).val());
        var orgContents=$.trim($('#grantDateBlock'+id).text());

        if( contents === orgContents ){
            cancel(id);
            return toggleGrantDate(id);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'ajax_store?id=' + id,
            type: 'POST',
            data: { 'id' : id , 'grantDate' : contents },
        }).done(function (results){
            // 成功したときのコールバック
            var date = new Date(results.grantDate);
            var year = date.getFullYear();
            var month = ('00'+(date.getMonth()+1)).slice(-2);
            var day = ('00'+date.getDate()).slice(-2);
            contents=year+'-'+month+'-'+day;
            $('#grantDate'+id).val(contents);
            $('#grantDateBlock'+id).text(contents);
            $('#dispPaidLeave'+id).prop('checked',true);
        }).fail(function(jqXHR, textStatus, errorThrown){
            // 失敗したときのコールバック
            alert('fail');
        });

        return toggleGrantDate(id);
    });

    function cancel(id){
        var orgContents=$.trim($('#grantDateBlock'+id).text());
        if(orgContents){
            $('#grantDate'+id).val(orgContents);
        }
    };

    function toggleGrantDate(id){
        $('#grantDateBlock'+id+',#grantDateFormBlock'+id+',#correct'+id+',#edit'+id).toggleClass('d-none');
        return false;
    };
})
