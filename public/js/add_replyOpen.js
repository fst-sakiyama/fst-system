$('.openReply').on('click',function(){
  var val = $(this).attr('id');
  var openReply = $('.'+val);
  $('.addReply').toggleClass('justify-content-end');
  if($(this).text().indexOf('閉じる')>-1){
    $('.addReply').css('display','none');
    $(this).text('返信を開く...');
  } else {
    $('.addReply').css('display','none');
    $('.openReply').text('追記を開く...')
    openReply.css('display','block');
    $(this).text('返信を閉じる');
  }
});
