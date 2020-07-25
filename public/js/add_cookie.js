$('.nav-link').on('click',function() {
  var val=$(this).attr('id');
  if(val.indexOf('-tab')>-1){
    $.cookie('clickTab',val);
  }
});

$(document).ready(function() {
  var cookie = $.cookie('clickTab');
  if(cookie) {
    //一旦すべての active を外す
    $('a[data-toggle="tab"]').parent().removeClass('active');
    $('#'+cookie).click();
  }
})

$('.openAddCard').on('click',function(){
  var val = $(this).attr('id');
  var openCard = $('.'+val);
  if($(this).text().indexOf('閉じる')>-1){
    $('.addCard').css('display','none');
    $(this).text('追記を開く...');
  } else {
    $('.addCard').css('display','none');
    $('.openAddCard').text('追記を開く...')
    openCard.css('display','block');
    $(this).text('追記を閉じる');
  }
});

$('.trashTable').on('click',function(){
  var val = $(this).data('class');
  $('.cardItem').css('display','none');
  $('.card_'+val).css('display','block');
  $(window).scrollTop(0);
});

$('.trashWellKnownTable').on('click',function(){
  var val = $(this).data('class');
  $('.wellKnownCardItem').css('display','none');
  $('.wellKnownCard_'+val).css('display','block');
  $(window).scrollTop(0);
});

$('.searchTable').on('click',function(){
  var val = $(this).data('class');
  $('.searchItem').css('display','none');
  $('.search_'+val).css('display','block');
  $(window).scrollTop(0);
});

$('.cardItemClose').on('click',function(){
  $('.cardItem').css('display','none');
});

$('.wellKnownCardItemClose').on('click',function(){
  $('.wellKnownCardItem').css('display','none');
});

$('.searchItemClose').on('click',function(){
  $('.searchItem').css('display','none');
});

$('.searchReset').on('click',function(){
  window.location.reload();
});
