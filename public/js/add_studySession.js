$('.sessionOpen').on('click',function(){
    removeClassLineMarker();
    var obj=$(this).next('.sessionBlock');
    obj.toggleClass('d-none');
    if($(this).text().indexOf('開く') > -1){
        $(this).text('ソースを閉じる');
    }else{
        $(this).text('ソースを開く');
    }
});

$('.lineMarker').on('click',function(){
    removeClassLineMarker();
    $(this).addClass('mark');
});

function removeClassLineMarker()
{
    $('.lineMarker').each(function(){
        if($(this).hasClass('mark')){
            $(this).removeClass('mark');
        }
    });
}
