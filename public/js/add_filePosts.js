$(document).ready(function(){

    $('[id^=pr_txt]').on('blur',function(){
      var id=$(this).attr('id').replace('pr_txt','');
      return setTimeout(function(){
          pr_cancel(id);
          return pr_toggleTextarea(id);
      },250);
    });

    $('[id^=pr_textareaCorrect]').on('click',function(){
      var id=$(this).attr('id').replace('pr_textareaCorrect','');
      pr_toggleTextarea(id);
      $('#pr_textarea'+id+' textarea').focus();
    });

    $('[id^=pr_textareaSubmit]').on('click',function(){
      var id=$(this).attr('id').replace('pr_textareaSubmit','');
      var contents=$.trim($('#pr_textarea'+id+' textarea').val());
      var orgContents=$.trim($('#pr_text'+id).text());

      if(contents == '' || contents === orgContents ){
        return false;
      }

      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: 'file_posts/pr_detail?id=' + id,
          type: 'POST',
          data: { 'project_detail' : contents },
      }).done(function (results){
          // 成功したときのコールバック
          contents=$.nl2br(results.project_detail);
          $('#pr_text'+id).html(contents);
          $('#pr_txt'+id).val(results.project_detail);
      }).fail(function(jqXHR, textStatus, errorThrown){
          // 失敗したときのコールバック
          alert('fail');
      });

    });

    $('[id^=pr_textareaCancel]').on('click',function(){
      var id=$(this).attr('id').replace('pr_textareaCancel','');
      pr_cancel(id);
    });

    function pr_cancel(id){
      var orgContents=$.trim($('#pr_text'+id).html());
      var re = /<br *\/?>/gi;
      orgContents = orgContents.replace(re,'\n');
      $('#pr_txt'+id).val(orgContents);
    };
    function pr_toggleTextarea(id){
      $('#pr_text'+id+',#pr_textareaCorrect'+id+',#pr_textareaSubmit'+id+',#pr_textareaCancel'+id+',#pr_textarea'+id).toggleClass('d-none');
      return false;
    };
});



$(document).ready(function(){

    $('[id^=txt]').on('blur',function(){
      var id=$(this).attr('id').replace('txt','');
      return setTimeout(function(){
          cancel(id);
          return toggleTextarea(id);
      },250);
    });

    $('[id^=textareaCorrect]').on('click',function(){
      var id=$(this).attr('id').replace('textareaCorrect','');
      toggleTextarea(id);
      $('#textarea'+id+' textarea').focus();
    });

    $('[id^=textareaSubmit]').on('click',function(){
      var id=$(this).attr('id').replace('textareaSubmit','');
      var contents=$.trim($('#textarea'+id+' textarea').val());
      var orgContents=$.trim($('#text'+id).text());

      if(contents == '' || contents === orgContents ){
        return toggleTextarea(id);
      }

      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: 'file_posts/detail?id=' + id,
          type: 'POST',
          data: { 'project_detail' : contents },
      }).done(function (results){
          // 成功したときのコールバック
          contents=$.nl2br(results.project_detail);
          $('#text'+id).html(contents);
          $('#txt'+id).val(results.project_detail);
      }).fail(function(jqXHR, textStatus, errorThrown){
          // 失敗したときのコールバック
          alert('fail');
      });

      return toggleTextarea(id);
    });

    $('[id^=textareaCancel]').on('click',function(){
      var id=$(this).attr('id').replace('textareaCancel','');
      cancel(id);
      return toggleTextarea(id);
    });

    function cancel(id){
      var orgContents=$.trim($('#text'+id).text());
      var re = /<br *\/?>/gi;
      orgContents = orgContents.replace(re,'\n');
      $('#txt'+id).val(orgContents);
    };
    function toggleTextarea(id){
      $('#text'+id+',#textareaCorrect'+id+',#textareaSubmit'+id+',#textareaCancel'+id+',#textarea'+id).toggleClass('d-none');
      return false;
    }
});



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

  var val=$(this).attr('id').replace('pr_submit','');
  if(!$('#pr_folder'+val).val()){
    $('#pr_messageFolder'+val).fadeIn().removeClass('d-none').slideUp(2000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  if(!$('#pr_customFile'+val).val()){
    $('#pr_messageFile'+val).fadeIn().removeClass('d-none').slideUp(2000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  $(this).submit();
  $(this).css('pointer-events','none');
});



$('[id^=submit]').on('click',function(){

  var val=$(this).attr('id').replace('submit','');
  if(!$('#folder'+val).val()){
    $('#messageFolder'+val).fadeIn().removeClass('d-none').slideUp(2000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  if(!$('#customFile'+val).val()){
    $('#messageFile'+val).fadeIn().removeClass('d-none').slideUp(2000,function(){
      $(this).addClass('d-none');
    });
    return false;
  }
  $(this).submit();
  $(this).css('pointer-events','none');
});



$(document).ready(function(){

    $('[id^=pr_correctText]').blur(function(){
        var id=$(this).attr('id').replace('pr_correctText','');
        return setTimeout(function(){
            var orgval = $.trim($('#pr_orgFileName'+id).text());
            var orgval = orgval.split('.')[0];
            $('#pr_correctText'+id).val(orgval);
            pr_func(id);
        },250);
    });

    $('[id^=pr_submitName]').on('click',function(){
        var id=$(this).attr('id').replace('pr_submitName','');
        var fileName = $('#pr_correctText'+id).val();
        var ext = $('#pr_extension'+id).text();
        var orgval = $.trim($('#pr_orgFileName'+id).text());

        if(fileName == ''){return false;}
        if(fileName+ext !== orgval ){

            var marks=["\\",'/',':','*','?',"<",">",'|','.'];
            for(var i=0;i<marks.length;i++){
              if(fileName.includes(marks[i])){
                  alert('使えない文字が含まれています');
                  $(this).focus();
                  return false;
              }
            }

            var projectId = $('#pr_projectId'+id).val();

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
                var month = ('00'+(date.getMonth()+1)).slice(-2);
                var day = ('00'+date.getDate()).slice(-2);
                var hour = ('00'+date.getHours()).slice(-2);
                var minute = ('00'+date.getMinutes()).slice(-2);
                var second = ('00'+date.getSeconds()).slice(-2);
                var correctVal = results.fileName;

                $('#pr_orgFileName'+id).text(correctVal);
                $('#pr_updated_at'+id).text(year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second);
                var correctVal = correctVal.split('.')[0];
                $('#pr_correctText'+id).val(correctVal);

            }).fail(function(jqXHR, textStatus, errorThrown){
                // 失敗したときのコールバック
                alert('fail');
            });
        }

        return pr_func(id);
    });

});

function pr_func(id){
  $('#pr_correctItem'+id).addClass('d-none');
  $('#pr_correctBlock'+id).removeClass('d-none');
  return false;
};


$(document).ready(function(){

    $('[id^=correctText]').blur(function(){
        var id=$(this).attr('id').replace('correctText','');
        return setTimeout(function(){
            var orgval = $.trim($('#orgFileName'+id).text());
            var orgval = orgval.split('.')[0];
            $('#correctText'+id).val(orgval);
            func(id);
        },250);
    });

    $('[id^=submitName]').on('click',function(){
        var id=$(this).attr('id').replace('submitName','');
        var fileName = $('#correctText'+id).val();
        var ext = $('#extension'+id).text();
        var orgval = $.trim($('#orgFileName'+id).text());

        if(fileName == ''){return false;}
        if(fileName+ext !== orgval ){

            var marks=["\\",'/',':','*','?',"<",">",'|','.'];
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
                var month = ('00'+(date.getMonth()+1)).slice(-2);
                var day = ('00'+date.getDate()).slice(-2);
                var hour = ('00'+date.getHours()).slice(-2);
                var minute = ('00'+date.getMinutes()).slice(-2);
                var second = ('00'+date.getSeconds()).slice(-2);
                var correctVal = results.fileName;

                $('#orgFileName'+id).text(correctVal);
                $('#updated_at'+id).text(year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second);
                var correctVal = correctVal.split('.')[0];
                $('#correctText'+id).val(correctVal);

            }).fail(function(jqXHR, textStatus, errorThrown){
                // 失敗したときのコールバック
                alert('fail');
            });
        }

        return func(id);
    });

});

function func(id){
  $('#correctItem'+id).addClass('d-none');
  $('#correctBlock'+id).removeClass('d-none');
  return false;
};


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
