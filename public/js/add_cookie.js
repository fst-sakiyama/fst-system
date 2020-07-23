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
