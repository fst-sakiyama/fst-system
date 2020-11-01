$('#workLoad-tab').on('click',function(){
  var item = $('#calcWorkHour').text();
  $('#wl-calcWorkHour').html(item);
});

$('.calcWorkMin').on('change',function(){
  var item = 0;
  $('.calcWorkMin').each(function(){
    var str = $(this).val();
    if(str){
      item += parseInt(str);
    }
  });
  $('#wl-sumClcWorkhour').html(item);
});
