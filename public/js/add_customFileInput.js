bsCustomFileInput.init();

document.getElementById('inputFileReset').addEventListener('click', function() {
  var elem = document.getElementById('customFile');
  elem.value = '';
  elem.dispatchEvent(new Event('change'));
});

$('[id^=inputFileReset]').on('click',function(){
  var val = $(this).attr('id').replace('inputFileReset','');
  var elem = $('#customFile'+val);
  elem.val('');
  $('.customFile'+val).html('ファイル選択...複数選択可');
});
