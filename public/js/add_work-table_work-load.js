$('#workSubmit').on('click',function(){

    // バリデーションチェック
    // 出退勤は全部入っているか、入っていないか
    var sh = $('#startHour').val();
    var sm = $('#startMinute').val();
    var eh = $('#endHour').val();
    var em = $('#endMinute').val();
    var rest1sh = $('#rest1StartHour').val();
    var rest1sm = $('#rest1StartMinute').val();
    var rest1eh = $('#rest1EndHour').val();
    var rest1em = $('#rest1EndMinute').val();
    var rest2sh = $('#rest2StartHour').val();
    var rest2sm = $('#rest2StartMinute').val();
    var rest2eh = $('#rest2EndHour').val();
    var rest2em = $('#rest2EndMinute').val();
    var rest3sh = $('#rest3StartHour').val();
    var rest3sm = $('#rest3StartMinute').val();
    var rest3eh = $('#rest3EndHour').val();
    var rest3em = $('#rest3EndMinute').val();
    var lateEarlyLeave = $('#lateEarlyLeave').prop('checked');

    var str = '';

    if(inCheck(sh,sm,eh,em)){ //全部に値が入っている場合（出勤）
        if(confTime(sh,sm,eh,em)){ //出勤時刻よりも退勤時刻の方が後である
            var shsm = calcSec(sh,sm);
            var ehem = calcSec(eh,em);
            str = restCheck(rest1sh,rest1sm,rest1eh,rest1em,shsm,ehem);
            if(!str) str = restCheck(rest2sh,rest2sm,rest2eh,rest2em,shsm,ehem);
            if(!str) str = restCheck(rest3sh,rest3sm,rest3eh,rest3em,shsm,ehem);
            if(!str && lateEarlyLeave){ //遅刻早退にチェックが入っている
                if($('#specialReason').val()){
                    str = '遅刻もしくは早退の理由を入力してください。';
                }
            }
        }else{ //出勤時刻よりも退勤時刻の方が早い（エラー）
            str = '出勤時刻と退勤時刻に誤りがあります。';
        }
    }else if(outCheck(sh,sm,eh,em)){ //全部に値が入っていない場合（お休み）
        if(outCheck(rest1sh,rest1sm,rest1eh,rest1em) && outCheck(rest2sh,rest2sm,rest2eh,rest2em) && outCheck(rest3sh,rest3sm,rest3eh,rest3em)){
            if(lateEarlyLeave){ //お休みなのに遅刻早退にチェックが入っている
                str = '遅刻早退のチェックは必要ありません。';
            }
        }else{ //お休みなのに休憩時間が入っている
            str = '休憩時刻の入力は必要ありません。';
        }
    }else{ //出退勤のどれかにnullが入っている場合（エラー）
        str = '出勤時刻と退勤時刻はすべてが入力されている必要があります。';
    }

    var subItem = calculationWorkLoad();
    $('[id$=subCalcWorkMin]').val(subItem);
    $('#workLoad1').val(subItem);

    // バリデーションチェック
    var subCalcWorkMin = $('#wl-subCalcWorkMin').val();
    if(subCalcWorkMin<0){ // 未振分がマイナスの場合
        str = '未振分がマイナスです。工数表を確認してください。'
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
function restCheck(val1,val2,val3,val4,val5,val6){
  if(inCheck(val1,val2,val3,val4)){
    if(confTime(val1,val2,val3,val4)){
      var val1val2 = calcSec(val1,val2);
      var val3val4 = calcSec(val3,val4);
      if((val5<val1val2 && val1val2<val6) && (val5<val3val4 && val3val4<val6)){
        return '';
      }else{
        return '休憩は出勤している時間内に取得してください。';
      }
    }else{
      return '休憩の時間に誤りがあるようです。';
    }
  }else if(outCheck(val1,val2,val3,val4)){
    return '';
  }else{
    return '休憩時刻の入力が不完全です。'
  }
};



$(".auto-resize").attr("rows", 1).on("input", e => {
  $(e.target).height(0).innerHeight(e.target.scrollHeight);
});



$(document).ready(function(){
  $('.auto-resize').each(function(){
    var str = $(this).val();

    if (str) {
      var increase = 0;

      // 改行毎に文章を抽出
      var line = str.match(/.*\n/g);
      if (line) {
        $.each( line, function(i, val){
          // 改行毎に行追加
          increase += 1;

          // 1行あたり30文字を超えていたら行追加
          val_byte = getByte(val);
          if (val_byte > 26) {
            increase += Math.round(val_byte / 26);
          }
        });
      } else {
        // 1行あたり30文字を超えていたら行追加
        val_byte = getByte(str);
        if (val_byte > 26) {
          increase += Math.round(val_byte / 26);
        }
      }

      $(this).attr('rows', 1 + increase);
    } else {
      // 空の場合は初期値をセット
      $(this).attr('rows', 1);
    }

  });

  /**
   * バイト数計算
   * @param {string} val
   * @return {int}
   */
  function getByte(val)
  {
    var val_byte = 0;
    for (var i = 0; i < val.length; i++){
      if (escape(val.charAt(i)).length <= 3) {
        // 半角は1
        val_byte += 1;
      } else {
        // 全角は2
        val_byte += 2;
      }
    }

    return val_byte;
  }
});



$('tr[data-link]').addClass('clickable')
  .click(function(e){
    var val=$(this).data('link');
    var str=$('.slideRow'+val).attr('class');
    if($('.slideRow'+val).hasClass('d-none')){
      $('.slideRow'+val).removeClass('d-none');
      $('.slideRow'+val).addClass('d-table-row');
    } else {
      $('.slideRow'+val).removeClass('d-table-row');
      $('.slideRow'+val).addClass('d-none');
    }
});
