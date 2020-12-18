$('#checkboxDvr').change(function(){
    $('.checkboxPng').each(function(){
        $(this).toggleClass('d-none');
    });
});
