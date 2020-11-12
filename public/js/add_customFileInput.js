bsCustomFileInput.init();

$('[id^=pr_inputFileReset]').on('click',function(){
  var val = $(this).attr('id').replace('pr_inputFileReset','');
  var elem = $('#pr_customFile'+val);
  elem.val('');
  $('.pr_label'+val).html('ファイル選択...複数選択可');
});

$('[id^=inputFileReset]').on('click',function(){
  var val = $(this).attr('id').replace('inputFileReset','');
  var elem = $('#customFile'+val);
  elem.val('');
  $('.label'+val).html('ファイル選択...複数選択可');
});
