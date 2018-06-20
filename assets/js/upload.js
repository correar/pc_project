$(document).on("submit", "form", function(event)
{
    event.preventDefault();
    var url=$(this).attr("action");
    var datas = new FormData(this);
    var percent = $('#percent_pf');
    var percentVal = 0;
    $.ajax({
        url: url,
        type: 'POST',
        data: datas,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $("#error_pf").html("");
            
            percent.css("width", percentVal+"%").attr("aria-valuenow", percentVal).text(percentVal + "% Completo");
            console.log(percentVal);
            
            var interval = setInterval(function() {
                percentVal += 1;
                if (percentVal > 100)
                  percentVal = 100; 
                percent
                .css("width", percentVal + "%")
                .attr("aria-valuenow", percentVal)
                .text(percentVal + "% Completo");
                if (percentVal >= 90)
                    clearInterval(interval);
            }, 500);

        },
        success: function (data, status)
        {
          console.log(data+" "+status)
          percentVal = 100;
          percent.css("width", percentVal+"%").attr("aria-valuenow", percentVal).text(percentVal + "% Completo");
          console.log(percentVal);
          $("#result_pf").html(data+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
          $("#result_pf").show();
          $("#arquivo_pf").val("");
        },
        error: function (xhr, desc, err)
        {
          $("#error_pf").html(err+' '+desc+' '+xhr+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
          percentVal = 0;
          percent.css("width", percentVal+"%").attr("aria-valuenow", percentVal).text(percentVal + "% Completo");
          console.log(percentVal);
          $("#error_pf").show();
          $("#arquivo_pf").val("");
        }
    });

});

$("#error_pf").hide();
$("#result_pf").hide();
$("#error_pj").hide();
$("#result_pj").hide();

$("#arquivo_pf").on('change', function(){
  var file = this.files[0];
  //console.log(file.type);
  if(file.type == "text/xml"){
    //console.log("xml");
    $("#error_pf").html("");
    //return true;
  }
  else{
    //$("#error_pf").alert("O Arquvivo "+file.name+" não é xml");
    $("#error_pf").html("O Arquvivo "+file.name+' não é xml <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
    $("#error_pf").show();
    $("#arquivo_pf").val("");
    //console.log("error1");
  }
});


