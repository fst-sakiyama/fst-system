$('#checkboxDvr').change(function(){
    $('.checkboxPng').each(function(){
        $(this).toggleClass('d-none');
    });
});

$('#liveSubmit').on('click',function(){

    var issueNo = $('#issueNo').val();
    var eventDay = $('#eventDay').val();
    var sh = $('#startHour').val();
    var sm = $('#startMinute').val();
    var eh = $('#endHour').val();
    var em = $('#endMinute').val();
    var liveName = $('#liveName').val();

    var str = '';

    if(isNumeric(issueNo)){
        str = 'issueNoを半角数字で入力してください。';
        $('#issueNo').focus();
    }

    if(!str){
        if(inCheck(sh,sm,eh,em)){ //全部に値が入っている場合（出勤）
            if(!confTime(sh,sm,eh,em)){ //出勤時刻よりも退勤時刻の方が後である
                str = '開始時刻と終了時刻に誤りがあります。';
            }
        }else{ //出退勤のどれかにnullが入っている場合（エラー）
            str = '開始時刻と終了時刻はすべてが入力されている必要があります。';
        }
    }

    if(!str){
        if(!liveName){
            str = 'ライブ名を入力してください。';
        }
    }

    if(str){ //エラーがある場合
        $('#message').text(str);
        $('#messageBlock').fadeIn(500).removeClass('d-none');
        return false;
    }

    $(this).submit();
    $(this).css('pointer-events','none');

});


function inCheck(val1,val2,val3,val4){
  if(val1 && val2 && val3 && val4){
    return true;
  }else{
    return false;
  }
};
function outCheck(val1,val2,val3,val4){
  if(!val1 && !val2 && !val3 && !val4){
    return true;
  }else{
    return false;
  }
};
function confTime(val1,val2,val3,val4){
  var val1val2 = calcSec(val1,val2);
  var val3val4 = calcSec(val3,val4);
  if(val1val2 < val3val4){
    return true;
  }else{
    return false;
  }
};
function calcSec(val1,val2){
  return val1*3600+val2*60;
};

/**
 * 半角数字かチェック
 * @return true:半角数字である(もしくは対象文字列がない), false:半角数字でない
 */
function isNumeric(value) {
  if (!value){
      return true;
  }
  if( value.match( /[^0-9.,-]+/ ) ) {
      return true;
  }
  return false;
}
