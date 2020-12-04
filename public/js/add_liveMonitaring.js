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
