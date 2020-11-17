$(document).ready(function(){
  var inner = window.innerWidth;
  $('.clientName').attr('style','width:'+inner*0.3+'px;');
  $('.projectName').attr('style','width:'+inner*0.5+'px;');
  $('.workLoad').attr('style','width:'+inner*0.2+'px;');

  var subItem = calculationWorkLoad();
  $('[id$=subCalcWorkMin]').val(subItem);
  $('#workLoad1').val(subItem);
});

$('#workLoad-tab').on('click',function(){
  var subItem = calculationWorkLoad();
  $('[id$=subCalcWorkMin]').val(subItem);
  $('#workLoad1').val(subItem);
});

$('.calcWorkMin').on('blur',function(){

  var val = $(this).val();
  
  if(val && !isNumHankaku(val)){
    alert('半角数字で入力してください。');
    $(this).val('');
    $(this).focus();
    return false;
  }

  var sumItem = 0;
  $('#workLoad1').val(0);
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
  $('#workLoad1').val(subItem);
});


function calculationWorkLoad(){
  var item = $('#calcWorkHour').text();
  // $('#wl-calcWorkMin').html(item);
  $('[id$=calcWorkMin]').val(item);

  var sumItem = 0;
  $('#workLoad1').val(0);
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
  return subItem;
}

function isNumHankaku(val){
	var pattern = /^([1-9]\d*|0)$/;
	return pattern.test(val);
}
