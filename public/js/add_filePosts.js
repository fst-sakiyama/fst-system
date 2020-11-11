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



$('[id^=pr_correctText]').blur(function(){

  var id=$(this).attr('id').replace('pr_correctText','');
  var fileName = $(this).val();
  var orgval = $('#pr_orgFileName'+id).text();

  if(fileName == '' || fileName === orgval ){
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
      data: { 'fileName' : fileName,'projectId' : projectId },
  }).done(function (results){
      // 成功したときのコールバック
      window.location=results.url;
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
  var orgval = $('#orgFileName'+id).text();

  if(fileName == '' || fileName === orgval ){
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
      data: { 'fileName' : fileName,'projectId' : projectId },
  }).done(function (results){
      // 成功したときのコールバック
      window.location=results.url;
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
