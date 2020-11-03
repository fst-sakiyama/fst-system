$('#workLoad-tab').on('click',function(){
  var item = $('#calcWorkHour').text();
  // $('#wl-calcWorkMin').html(item);
  $('[id$=calcWorkMin]').val(item);

  var sumItem = 0;
  $('.calcWorkMin').each(function(){
    var str = $(this).val();
    if(str){
      sumItem += parseInt(str);
    }
  });
  $('[id$=sumCalcWorkMin]').val(sumItem);
  var item = $('#wl-calcWorkMin').val();
  var subItem = item - sumItem;
  if(subItem<0){
    $('[id$=subCalcWorkMin]').addClass("text-danger");
  } else {
    $('[id$=subCalcWorkMin]').removeClass("text-danger");
  }
  $('[id$=subCalcWorkMin]').val(subItem);
});

$('.calcWorkMin').on('blur',function(){
  var sumItem = 0;
  $('.calcWorkMin').each(function(){
    var str = $(this).val();
    if(str){
      sumItem += parseInt(str);
    }
  });
  $('[id$=sumCalcWorkMin]').val(sumItem);
  var item = $('#wl-calcWorkMin').val();
  var subItem = item - sumItem;
  if(subItem<0){
    $('[id$=subCalcWorkMin]').addClass("text-danger");
  } else {
    $('[id$=subCalcWorkMin]').removeClass("text-danger");
  }
  $('[id$=subCalcWorkMin]').val(subItem);
});

$(document).ready(function(){
  var inner = window.innerWidth;
  $('.clientName').attr('style','width:'+inner*0.3+'px;');
  $('.projectName').attr('style','width:'+inner*0.5+'px;');
  $('.workLoad').attr('style','width:'+inner*0.2+'px;');
});
