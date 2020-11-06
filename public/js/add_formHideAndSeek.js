$('input[name^="workingTeamId"]').click(function(){
  var int = $(this).data('id');
  $('.hideAndSeek').each(function(){
    var int2 = $(this).data('id');
    if(int === int2){
      $(this).toggle(300);
    }
  });
});

$(document).ready(function(){
  $('input[name^="workingTeamId"]').each(function(){
    var val = $(this).prop("checked");
    var int = $(this).data('id');
    $('.hideAndSeek').each(function(){
      var int2 = $(this).data('id');
      if(int === int2){
        if(val){
          $(this).show();
        }
      }
    });
  });
});
