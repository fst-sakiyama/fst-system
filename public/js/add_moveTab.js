$(document).ready(function(){
  var inner = window.innerWidth;
  $('.projectName').attr('style','width:'+inner*0.5+'px;');
  $('.beforWorkLoad').attr('style','width:'+inner*0.08+'px;');
  $('.workLoad').attr('style','width:'+inner*0.12+'px;');
  $('.memo').attr('style','width:'+inner*0.3+'px;');

  var subItem = calculationWorkLoad();
  $('[id$=subCalcWorkMin]').val(subItem);
  $('#workLoad1').val(subItem);

  workLoadSum();
  workLoadMemo();
  beforeSum();
});

$('#workLoad-tab').on('click',function(){
  var subItem = calculationWorkLoad();
  $('[id$=subCalcWorkMin]').val(subItem);
  $('#workLoad1').val(subItem);

  workLoadSum();
  workLoadMemo();
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

  workLoadSum();
});

$('.workLoadMemo').on('blur',function(){
  workLoadMemo();
})

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
};


function workLoadSum(){
  $('[id^=workLoadSum]').each(function(){
    var sumItem = 0;
    var id=$(this).attr('id').replace('workLoadSum','');
    $('.workLoad'+id).each(function(){
      var str = $(this).val();
      if(str){
        sumItem += parseInt(str);
      }
    });
    if(sumItem==0){
      $(this).val('');
    }else{
      $(this).val(sumItem);
    }
  });
};


function beforeSum(){
  $('[id^=before]').each(function(){
    var sumItem = 0;
    var id=$(this).attr('id').replace('before','');
    $('.before'+id).each(function(){
      var str = $(this).val();
      if(str){
        sumItem += parseInt(str);
      }
    });
    if(sumItem==0){
      $(this).val('');
    }else{
      $(this).val(sumItem);
    }
  });
};

function workLoadMemo(){
  $('[id^=workLoadMemo]').each(function(){
    var memoCnt = 0;
    var id=$(this).attr('id').replace('workLoadMemo','');
    $('.memo'+id).each(function(){
      var str = $(this).val();
      if(str){
        memoCnt++;
      }
    });
    if(memoCnt==0){
      $(this).text('');
    }else{
      $(this).text('メモあり');
    }
  });
};


function isNumHankaku(val){
	var pattern = /^([1-9]\d*|0)$/;
	return pattern.test(val);
};
