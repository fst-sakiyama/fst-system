$('#workLoad-tab').on('click',function(){
  var item = $('#calcWorkHour').text();
  $('#wl-calcWorkMin').html(item);
});

$('.calcWorkMin').on('blur',function(){
  var sumItem = 0;
  $('.calcWorkMin').each(function(){
    var str = $(this).val();
    if(str){
      sumItem += parseInt(str);
    }
  });
  $('#wl-sumCalcWorkMin').html(sumItem);
  var item = $('#wl-calcWorkMin').html();
  var subItem = item - sumItem;
  if(subItem<0){
    $('#wl-subCalcWorkMin').addClass("text-danger");
  } else {
    $('#wl-subCalcWorkMin').removeClass("text-danger");    
  }
  $('#wl-subCalcWorkMin').html(subItem);
});
