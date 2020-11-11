$('tr[data-href]').addClass('clickable')
  .click(function(e){
    if(!($(e.target).is('a') || $(e.target).is('i') || $(e.target).is('input'))){
      window.open($(e.target).closest('tr').data('href'),'_blank');
    };
  });

$('tr[data-link]').addClass('clickable')
  .click(function(e){
    var val=$(this).data('link');
    var str=$('.slideRow'+val).attr('class');
    if($('.slideRow'+val).hasClass('d-none')){
      $(this).html($(this).html().replace('<i class="fas fa-folder"></i>','<i class="fas fa-folder-open"></i>'));
      $('.slideRow'+val).removeClass('d-none');
      $('.slideRow'+val).addClass('d-table-row');
    } else {
      $(this).html($(this).html().replace('<i class="fas fa-folder-open"></i>','<i class="fas fa-folder"></i>'));
      $('.slideRow'+val).removeClass('d-table-row');
      $('.slideRow'+val).addClass('d-none');
    }
});
