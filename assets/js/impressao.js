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


