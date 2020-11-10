$('tr[data-href]').addClass('clickable')
  .click(function(e){
    if(!$(e.target).is('a')){
      window.location = $(e.target).closest('tr').data('href');
    };
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
