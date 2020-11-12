$('[id^=pr_correctName]').on('click',function(){
  var val=$(this).attr('id').replace('pr_correctName','');
  $('#pr_correctBlock'+val).addClass('d-none');
  $('#pr_correctItem'+val).removeClass('d-none');
  $('#pr_correctText'+val).focus();
});



$('[id^=correctName]').on('click',function(){
  var val=$(this).attr('id').replace('correctName','');
  $('#correctBlock'+val).addClass('d-none');
  $('#correctItem'+val).removeClass('d-none');
  $('#correctText'+val).focus();
});



$('[id^=pr_submit]').on('click',function(){
  $(this).css('pointer-events','none');
  var val=$(this).attr('id').replace('pr_submit','');
  if(!$('#pr_folder'+val).val()){
    $('#pr_messageFolder'+val).fadeIn().removeClass('d-none').fadeOut(4000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  if(!$('#pr_customFile'+val).val()){
    $('#pr_messageFile'+val).fadeIn().removeClass('d-none').fadeOut(4000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  $(this).submit();
});



$('[id^=submit]').on('click',function(){
  $(this).css('pointer-events','none');
  var val=$(this).attr('id').replace('submit','');
  if(!$('#folder'+val).val()){
    $('#messageFolder'+val).fadeIn(1000).removeClass('d-none').fadeOut(4000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  if(!$('#customFile'+val).val()){
    $('#messageFile'+val).fadeIn(1000).removeClass('d-none').fadeOut(4000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  $(this).submit();
});



$('[id^=pr_correctText]').blur(function(){

  var id=$(this).attr('id').replace('pr_correctText','');
  var fileName = $(this).val();
  var ext = $('#pr_extension'+id).text();
  var orgval = $('#pr_orgFileName'+id).text();

  if(fileName == '' || fileName+ext === orgval ){
    return func(id);
  }

  var marks=["\\",'/',':','*','?','a',"<",">",'|','.'];
  for(var i=0;i<marks.length;i++){
    if(fileName.includes(marks[i])){
      alert('使えない文字が含まれています');
      $(this).focus();
      return false;
    }
  }

  var projectId = $('#projectId'+id).val();

  $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'file_posts/pr_change?id=' + id,
      type: 'POST',
      data: { 'fileName' : fileName+ext,'projectId' : projectId },
  }).done(function (results){
      // 成功したときのコールバック
      var date = new Date(results.updated_at);
      var year = date.getFullYear();
      var month = ('00'+date.getMonth()+1).slice(-2);
      var day = ('00'+date.getDate()).slice(-2);
      var hour = ('00'+date.getHours()).slice(-2);
      var minute = ('00'+date.getMinutes()).slice(-2);
      var second = ('00'+date.getSeconds()).slice(-2);

      $('#pr_orgFileName'+id).text(results.fileName);
      $('#pr_updated_at'+id).text(year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second);
  }).fail(function(jqXHR, textStatus, errorThrown){
      // 失敗したときのコールバック
      alert('fail');
  });

  return func(id);

  function func(id){
    $('#pr_correctItem'+id).addClass('d-none');
    $('#pr_correctBlock'+id).removeClass('d-none');
    return false;
  }
});



$('[id^=correctText]').blur(function(){

  var id=$(this).attr('id').replace('correctText','');
  var fileName = $(this).val();
  var ext = $('#extension'+id).text();
  var orgval = $('#orgFileName'+id).text();

  if(fileName == '' || fileName+ext === orgval ){
    return func(id);
  }

  var marks=["\\",'/',':','*','?','a',"<",">",'|','.'];
  for(var i=0;i<marks.length;i++){
    if(fileName.includes(marks[i])){
      alert('使えない文字が含まれています');
      $(this).focus();
      return false;
    }
  }

  var projectId = $('#projectId'+id).val();

  $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'file_posts/change?id=' + id,
      type: 'POST',
      data: { 'fileName' : fileName+ext,'projectId' : projectId },
  }).done(function (results){
      // 成功したときのコールバック
      var date = new Date(results.updated_at);
      var year = date.getFullYear();
      var month = ('00'+date.getMonth()+1).slice(-2);
      var day = ('00'+date.getDate()).slice(-2);
      var hour = ('00'+date.getHours()).slice(-2);
      var minute = ('00'+date.getMinutes()).slice(-2);
      var second = ('00'+date.getSeconds()).slice(-2);

      $('#orgFileName'+id).text(results.fileName);
      $('#updated_at'+id).text(year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second);
  }).fail(function(jqXHR, textStatus, errorThrown){
      // 失敗したときのコールバック
      alert('fail');
  });

  return func(id);

  function func(id){
    $('#correctItem'+id).addClass('d-none');
    $('#correctBlock'+id).removeClass('d-none');
    return false;
  }

});



$('[id^=pr_delItem]').on('click',function(){
  if(!confirm('本当に削除していいですか？')){
    return false;
  }else{
    var id=$(this).attr('id').replace('pr_delItem','');
    var projectId = $('#projectId'+id).val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'file_posts/pr_del?id=' + id,
        type: 'POST',
        data: { 'projectId' : projectId },
    }).done(function (results){
        // 成功したときのコールバック
        window.location=results.url;
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert('fail');
    });
  }
});



$('[id^=delItem]').on('click',function(){
  if(!confirm('本当に削除していいですか？')){
    return false;
  }else{
    var id=$(this).attr('id').replace('delItem','');
    var projectId = $('#projectId'+id).val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'file_posts/del?id=' + id,
        type: 'POST',
        data: { 'projectId' : projectId },
    }).done(function (results){
        // 成功したときのコールバック
        window.location=results.url;
    }).fail(function(jqXHR, textStatus, errorThrown){
        // 失敗したときのコールバック
        alert('fail');
    });
  }
});
