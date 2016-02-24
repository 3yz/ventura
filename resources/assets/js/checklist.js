$( document ).ready(function(){
  var errors = new Array();
  //check meta
  $('meta').each(function(){
    if($(this).attr('charset') == undefined) {
      if(this.content == '') {
        errors.push({
          'name' : 'Metatag em branco: ' + ($(this).attr('name') != undefined ? $(this).attr('name') : $(this).attr('property'))
        });
      }
    }
  });
  //check favicon
  if($('link[rel~="icon"]').attr('href') == '') {
    errors.push({
      'name' : 'Favicon não encontrado'
    });
  }
  //check title
  if($('title').val() == '') {
    errors.push({
      'name' : 'Title em branco'
    });
  }
  //check ga
  if(tracking_code == 'UA-XXXXX-X') {
    errors.push({
      'name' : 'ID do Google Analytics não configurado'
    });
  }

  //create div
  if(errors.length > 0) {
    if($('meta[name="env"]').attr('content') == 'local') {
      var message = 'Atenção, existem problemas a serem corrigidos antes da publicação!';
      $.each(errors, function(i, elem) {
        message+= '\n - ' + elem.name;
      });
      console.error(message);
    } else {
      var skyline = $('<div>').css({ 'background-color': '#fff6bf', 'font-family': 'sans-serif', 'border' : '2px solid #ffd324', 'padding' : '10px' });
      var html = '<h1>Atenção, existem problemas a serem corrigidos antes da publicação!</h1>';
      html+='<ul>';
      $.each(errors, function(i, elem) {
        html+='<li>' + elem.name + '</li>';
      });
      html+='</ul>';

      skyline.html(html);

      $('body').prepend(skyline);
    }
  }
});