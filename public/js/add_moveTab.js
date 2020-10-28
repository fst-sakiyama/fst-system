$('#workLoad-tab').on('click',function(){
  var item = $('#calcWorkHour').text();
  alert(item);
  $('#wl-calcWorkHour').html(item);

  // var obj = document.forms["workTable_form"];
  // alert($(obj).serialize());
  // $.ajax({
  //   headers:{
  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //   },
  //   url:'/work_table/store',
  //   type:'POST',
  //   data: $(obj).serialize(),
  //   dataType:"json",
  //   success:function(data){
  //
  //   }
  // });

});
