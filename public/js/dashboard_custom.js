$(document).ready(function(){
        catch_data(1);

    function catch_data(query1 = '', query2 = '',query3 = '')
    {
    var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
        //var query1='Denver';
      //$(function() {
   // var query1 : {"Denver"};
    $.ajax({  
        url: '/fetchgraph',
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {query1:query1, query2:query2, query3:query3},
       dataType: "json",
        success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                
                var city = response[i].City_State_Combined;
                var entertainment = response[i].Miscellaneous;
                var food = response[i].Food;
                var income_taxes = response[i].Income_Taxes;
                var mortgage = response[i].Median_Home_Cost;
                var property_tax_rate = response[i].Property_Tax_Rate;
                var sales_tax = response[i].Sales_Taxes;
                var utilities = response[i].Utilities;
                var summ = parseInt(entertainment)+parseInt(food)+parseInt(income_taxes)+parseInt(mortgage)+parseInt(property_tax_rate)+parseInt(sales_tax)+parseInt(utilities);
                var tr_str = "<tr>" +
                   
                    "<td align='left'>" + city + "</td>" +
                    "<td align='center'>" + entertainment + "</td>" +
                    "<td align='center'>" + food + "</td>" +
                    "<td align='center'>" + income_taxes + "</td>" +
                    "<td align='center'>" + mortgage + "</td>" +
                    "<td align='center'>" + property_tax_rate + "</td>" +
                    "<td align='center'>" + sales_tax + "</td>" +
                    "<td align='center'>" + utilities + "</td>" +
                    "<td align='center'>" + summ + "</td>" +
                    "</tr>";

                $("#userTable tbody").append(tr_str);
            }

        }
    });
}

    $('#fetch_graph1').bind("change", function(){
     $("#userTable td").remove();
      var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      catch_data(1, query1,query2,query3);
    });

    $('#fetch_graph2').bind("change", function(){
    $("#userTable td").remove();
     var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      catch_data(1, query1,query2,query3);
    });

     $('#fetch_graph3').bind("change", function(){
    $("#userTable td").remove();
     var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
     //$("#userTable tbody").remove();
      catch_data(1, query1,query2,query3);
    });

     $( "#fetch_graph1" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#fetch_graph1" ).val()},  
          beforeSend: function(){
            $("#fetch_graph1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#fetch_graph1").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#fetch_graph2" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#fetch_graph2" ).val()},  
          beforeSend: function(){
            $("#fetch_graph2").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#fetch_graph2").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#fetch_graph3" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#fetch_graph3" ).val()},  
          beforeSend: function(){
            $("#fetch_graph3").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#fetch_graph3").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#map-search11" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#map-search11" ).val()},  
          beforeSend: function(){
            $("#map-search11").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#map-search11").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });
     
});