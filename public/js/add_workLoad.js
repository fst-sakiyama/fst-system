$(document).ready(function(){

    $('[id^=subtotalWorkLoad]').each(function(){
        id=$(this).attr('id').replace('subtotalWorkLoad','');
        var sub=0;
        $('.subtotalWorkLoad'+id).each(function(){
            var val=+($(this).text());
            if(val){
                sub+=val;
            }
        });
        $(this).val(sub);
    });
    $('[id^=totalWorkLoad]').each(function(){
        id=$(this).attr('id').replace('totalWorkLoad','');
        var sub=0;
        $('.totalWorkLoad'+id).each(function(){
            var val=+($(this).val());
            if(val){
                sub+=val;
            }
        });
        $(this).val(sub);
    });
    var sub=0;
    $('.total').each(function(){
        var val=+($(this).val());
        if(val){
            sub+=val;
        }
    });
    $('#total').val(sub);


});


$('.midashi').hover(
    function(){
        $(this).addClass('table-secondary');
    },
    function(){
        $(this).removeClass('table-secondary');
    }
);

$(function(){
    $('.js-modal-open').on('click',function(){
        var t=gett($(this));
        var id=getid($(this));
        $('.js-modal'+t+id).fadeIn();
        return false;
    });
    $('.js-modal-close').on('click',function(){
        var t=gett($(this));
        var id=getid($(this));
        $('.js-modal'+t+id).fadeOut();
        return false;
    });
    function gett(obj){
        return $(obj).data('t')+'';
    };
    function getid(obj){
        return $(obj).data('id')+'';
    };
});
