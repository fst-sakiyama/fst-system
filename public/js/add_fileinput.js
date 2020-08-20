$(document).ready(function(){
    bsCustomFileInput.init()
})

$('.reset').click(function(){
    $(this).parent().prev().children('.custom-file-label').html('ファイル選択...');
    $('#preview').remove();
    $('.custom-file-input').val('');
})

$('.add-box').click(function(){
    var cloneBox = $('.box:last').clone(true);
    var boxNo = cloneBox.attr('data-boxno');
    var boxNo1 = parseInt(boxNo) + 1;
    cloneBox.attr('data-boxno',boxNo1);

    var linkURL = cloneBox.find('input.linkURL').attr('name');
    linkURL = linkURL.replace(/referenceLinkURL\[[0-9]{1,2}/g,'referenceLinkURL[' + boxNo1);
    cloneBox.find('input.linkURL').attr('name',linkURL);
    cloneBox.find('input.linkURL').val('');

    var remarks = cloneBox.find('input.remarks').attr('name');
    remarks = remarks.replace(/remarks\[[0-9]{1,2}/g,'remarks[' + boxNo1);
    cloneBox.find('input.remarks').attr('name',remarks);
    cloneBox.find('input.remarks').val('');

    cloneBox.insertAfter($('.box:last'));
})

$('.delete-box').click(function(){
    var boxno = $('.box:last').attr('data-boxno');

    if(boxno != 0) {
      $(this).parents('.box').remove();

      var cnt = 0;

      $('.box').each(function(){

        $(this).attr('data-boxno',cnt);
        var linkURL = $('input.linkURL',this).attr('name');
        linkURL = linkURL.replace(/referenceLinkURL\[[0-9]{1,2}/g,'referenceLinkURL[' + cnt);
        $('input.linkURL',this).attr('name',linkURL);

        var remarks = $('input.remarks',this).attr('name');
        remarks = remarks.replace(/remarks\[[0-9]{1,2}/g,'remarks[' + cnt);
        $('input.remarks',this).attr('name',remarks);

        cnt += 1;

      });
    }
})
