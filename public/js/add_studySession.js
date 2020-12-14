$('.sessionOpen').on('click',function(){
    removeClassLineMarker();
    var obj=$(this).next('.sessionBlock');
    if($(this).text().indexOf('開く') > -1){
        obj.removeClass('d-none');
        $(this).text('ソースを閉じる');
    }else{
        obj.slideUp(500,function(){
            obj.addClass('d-none');
        });
        $(this).text('ソースを開く');
    }
});

$('.lineMarker').on('click',function(){
    removeClassLineMarker();
    $(this).addClass('mark');
})

function removeClassLineMarker()
{
    $('.lineMarker').each(function(){
        $(this).removeClass('mark');
    });
}
