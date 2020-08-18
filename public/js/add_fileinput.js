$(document).ready(function(){
    bsCustomFileInput.init()
})

$('.reset').click(function(){
    $(this).parent().prev().children('.custom-file-label').html('ファイル選択...');
    $('#preview').remove();
    $('.custom-file-input').val('');
})
