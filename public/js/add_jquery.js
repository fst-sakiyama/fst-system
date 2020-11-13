$('.deleteConf').click(function(){
    if(!confirm('本当に削除していいですか？')){
        /* キャンセルの時の処理 */
        return false;
    }else{
        /*　OKの時の処理 */
        var num=$(this).data('id');
        $('#form_' + num).submit();
    }
});

var $children = $('.children'); //子要素を変数に入れます。
var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく

//親要素のselect要素が変更になるとイベントが発生
$('.parent').change(function() {

  //選択された親要素のvalueを取得し変数に入れる
  var val1 = $(this).val();

  //削除された要素をもとに戻すため.html(original)を入れておく
  $children.html(original).find('option').each(function() {
    var val2 = $(this).data('val'); //data-valの値を取得

    //valueと異なるdata-valを持つ要素を削除
    if (val1 != val2) {
      $(this).not(':first-child').remove();
    }

  });

  //親要素側のselect要素が未選択の場合、子要素をdisabledにする
  if ($(this).val() == "") {
    $children.attr('disabled', 'disabled');
  } else {
    $children.removeAttr('disabled');
  }

});

$(document).ready(function(){
  $('.parent').trigger('change');
});

$('#modalTable1,#modalTable2').on('show.bs.modal',function(event){
  var button = $(event.relatedTarget);
  var val = button.data('whatever');
  var array = [];
  var modal = $(this);
  $('#'+val).find('a').each(function() {
    array.push($(this).data('val'));
  });
  var modal = $(this);
  modal.find('.modalHeader').text(array[1]+'-'+array[3]);
  modal.find('.modalBody').html(array[4]);
  modal.find('.modalFooter').text(array[5]);

});

$('.submit-button').on('click',function(){
  // $(this).css('pointer-events','none');
});
