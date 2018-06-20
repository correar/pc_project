$(document).on("submit", "form", function(event)
{
  event.preventDefault();
  var url=$(this).attr("action");

  if(url == "boletos.php"){
    var resp = $("#boletos");
  }else if(url == "processo.php"){
    var resp = $("#boletos");
  }
  var datas = new FormData(this);
    $.ajax({
        url: url,
        type: 'POST',
        data: datas,
        processData: false,
        contentType: false,
        success: function (data, status)
        {
          resp.html(data);
          resp.show();
        },
    });
});

$('input[type=checkbox][class=cb-selector]').click(function() {
      var cb = $(this),
        name = cb.attr('data-for');
      
      if(name == null)
        return false;
      $('input[type=checkbox][name^='+name+']')
        .prop('checked', cb.prop('checked'))
        .click(function() {
          if(!$(this).prop('checked'))
            cb.prop('checked', false);
        });
    });

