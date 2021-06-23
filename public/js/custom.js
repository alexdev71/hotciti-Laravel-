function getBulkCSV(){
    var query1 = $('#search_focus1').val();
    var query2 = $('#search_focus2').val();
    var query3 = $('#search_focus3').val();
    var query_region= $('#search_focus4').val();
    var query_county= $('#search_focus5').val();
    var query_pop_0= $('#search_focus6_0').val();
    var query_pop= $('#search_focus6').val();
    var query_nmc= $('#search_focus7').val();
    var query_ocl= $('#search_focus8').val();
    var query_mfr= $('#search_focus9').val();
    var query_mpop= $('#search_focus10').val();
    var query_mage= $('#search_focus11').val();
    var query_mhincome= $('#search_focus12').val();
    var query_strate= $('#search_focus13').val();
    var query_pt_rate= $('#search_focus14').val();
    var query_inc_trate= $('#search_focus15').val();
    var query_mh_cost= $('#search_focus16').val();
    var query_ump_rate= $('#search_focus17').val();
    var query_vio_crime= $('#search_focus18').val();
    var query_prop_crime= $('#search_focus19').val();
    var query_ann_rain= $('#search_focus20').val();
    var query_ann_sno= $('#search_focus21').val();
    var query_ann_prpp= $('#search_focus22').val();
    var query_ann_sunn= $('#search_focus23').val();
    var query_ahigh_tem= $('#search_focus24').val();
    var query_alow_tem= $('#search_focus25').val();
    var query_air_qua= $('#search_focus26').val();
    var query_wat_qua= $('#search_focus27').val();
    var query_com_tm= $('#search_focus28').val();
    var query_dem= $('#search_focus29').val();
    var query_rep= $('#search_focus30').val();
    var query_bsc= $('#search_focus31').val();
    var query_grado= $('#search_focus32').val();
    var query_per_rel= $('#search_focus33').val();
	var sortt = $("select[name='sortt']").val();
    var search_center_town = $("#search_center_town").val()
    var search_range = $("#search_range").val();
      $.ajax({
        url:"/BulkCSVdownload",
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, 
        data:{search_center_town:search_center_town, search_range:search_range, sortt:sortt, query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel},
        cache: false,

        success:function(data)
        {   
            var ShowLabel = true;
            var JSONData = data;
            var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

            var CSV = '';
            if (ShowLabel) {
                var row = "";
                for (var index in arrData[0]) {
                    row += index + ',';
                }

                row = row.slice(0, -1);
                CSV += row + '\r\n';
            }

            for (var i = 0; i < arrData.length; i++) {
                row = "";
                
                for (index in arrData[i]) {
                    row += '"' + arrData[i][index] + '",';
                }

                row.slice(0, row.length - 1);
                CSV += row + '\r\n';
            }

            if (CSV == '') {        
                alert("Invalid data");
                return;
            } 
            var fileName = "BulkCityData";
            var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
            var link = document.createElement("a");    
            link.href = uri;
            link.style = "visibility:hidden";
            link.download = fileName + ".csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }  
    });  
    
}
function getCSV(){
    var query=$("#hidden_id").val();
    $.ajax({  
        url:"/SingleCsvdata",  
        method:"GET",  
        data:{query:query},
        success:function(data)  
        {
            var ShowLabel = true;
            var JSONData = data;
            var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

            var CSV = '';
            if (ShowLabel) {
                var row = "";
                for (var index in arrData[0]) {
                    row += index + ',';
                }

                row = row.slice(0, -1);
                CSV += row + '\r\n';
            }

            for (var i = 0; i < arrData.length; i++) {
                row = "";
                
                for (index in arrData[i]) {
                    row += '"' + arrData[i][index] + '",';
                }

                row.slice(0, row.length - 1);
                CSV += row + '\r\n';
            }

            if (CSV == '') {        
                alert("Invalid data");
                return;
            } 
            var fileName = "CityData";
            var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
            var link = document.createElement("a");    
            link.href = uri;
            link.style = "visibility:hidden";
            link.download = fileName + ".csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }  
    });  
    
}
function getPDF(){
    var query=$("#hidden_id").val();
    $.ajax({  
        url:"/SingleCsvdata",
        method:"GET",  
        data:{query:query},
        success:function(data)  
        {    
            var ShowLabel = true;
            var JSONData = data;
            var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

            var CSV = '';
            if (ShowLabel) {
                var row = "";
                for (var index in arrData[0]) {
                    row += index + ',';
                }

                row = row.slice(0, -1);
                CSV += row + '\r\n';
            }

            for (var i = 0; i < arrData.length; i++) {
                row = "";
                
                for (index in arrData[i]) {
                    row += '"' + arrData[i][index] + '",';
                }

                row.slice(0, row.length - 1);
                CSV += row + '\r\n';
            }

            if (CSV == '') {        
                alert("Invalid data");  
                return;
            } 
            var fileName = "CityData";
            var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
            var link = document.createElement("a");    
            link.href = uri;
            link.style = "visibility:hidden";
            link.download = fileName + ".csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }  
    });  
    
}


function new_bulk_csv(){
    $.ajax({  
        url:"/new_bulk_csv",  
        method:"GET",
        success:function(data)  
        {
            var ShowLabel = true;
            var JSONData = data;
            var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

            var CSV = '';
            if (ShowLabel) {
                var row = "";
                for (var index in arrData[0]) {
                    row += index + ',';
                }

                row = row.slice(0, -1);
                CSV += row + '\r\n';
            }

            for (var i = 0; i < arrData.length; i++) {
                row = "";
                
                for (index in arrData[i]) {
                    row += '"' + arrData[i][index] + '",';
                }

                row.slice(0, row.length - 1);
                CSV += row + '\r\n';
            }

            if (CSV == '') {        
                alert("Invalid data");
                return;
            } 
            var fileName = "CityData";
            var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
            var link = document.createElement("a");    
            link.href = uri;
            link.style = "visibility:hidden";
            link.download = fileName + ".csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }  
    });  
    
}
function myFunction() {
    var query1=$("#hidden_email").val();
    var query2=$("#hidden_id").val(); 
    if (query1==null || query1.trim()=="") {
        Swal.fire("Register", "Please login or register to save favorite locations", "warning");
    }
    else {
        $.ajax({
            url:"/setfavorite",
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{query1:query1, query2:query2},
            success:function()
            {
             Swal.fire("Success!", "Your selection had been saved", "success");
            }
        });
       }
    }

$(document).ready(function(){
  var query1 = $('#search_focus1').val();
  var query2 = $('#search_focus2').val();
  var query3 = $('#search_focus3').val();
  var query_region= $('#search_focus4').val();
  var query_county= $('#search_focus5').val();
  var query_nmc= $('#search_focus7').val();
    $(".fav_remove_i").click(function(){
      var id = $(this).attr("id");
      $.ajax({
        url: "/removefav",
        method: "post",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
          id: id
        },
        success:function(response){
          if(response == "success"){
            $("li#"+id).remove();
            $(".cart-counter").text($(".cart-counter").text() - 1);
            $(".header-modal-top h4 span strong").text($(".header-modal-top h4 span strong").text() - 1);
            Swal.fire("Success", "Successfully removed a favorite!", "success");
          }
        }
      });
    });
    $("input").attr("autocomplete", "off");
    $( "#map-search1" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#map-search1" ).val()},  
          beforeSend: function(){
            $("#map-search1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#map-search1").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#map-search1" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){$("#home_explorer_form").submit();}, 1000);
      }
    });

    $( "#search_box" ).autocomplete({
      source: function(request, response){
        $.ajax({
          url:"/getcountylist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#search_box" ).val()},  
          beforeSend: function(){
            $("#search_box").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {
            $("#search_box").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#search_box" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#main_search_form").submit();
        }, 1000);
      }
    });

    $( "#search_box2" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getstatelist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#search_box2" ).val()},  
          beforeSend: function(){
            $("#search_box2").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#search_box2").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#search_box2" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#main_search_form").submit();
        }, 1000);
      }
    });

    
    
    
    $("#search_box1").change(function(){
      $("#main_search_form").submit();
    });



    $( "#city_home_search" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#city_home_search" ).val()},  
          beforeSend: function(){
            $("#city_home_search").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#city_home_search").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#city_home_search" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#main_home_form").submit();
        }, 1000);
      }
    });

    $( "#county_home_search" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getcountylist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#county_home_search" ).val()},  
          beforeSend: function(){
            $("#county_home_search").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#county_home_search").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#state_home_search" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getstatelist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#state_home_search" ).val()},  
          beforeSend: function(){
            $("#state_home_search").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#state_home_search").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });
      
     //  $('#main_search1').keyup(function(){  
     //       var query = $('#main_search1').val();  
     //            $.ajax({  
     //                 url:"/getsearchlist",  
     //                 method:"POST",
     //                 headers: {
     //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //                },
     //                 data:{query:query},  
     //                 beforeSend: function(){
     //        $("#main_search1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#search1').html(data); 
     //                      $("#main_search1").css("background","#FFF");
     //                 }  
     //            });  
     //      // }  
     //  });  
     // $("#main_search1").bind('change', function () {
     //       $('#main_search1').blur();  
     //  });

     $( "#main_search1" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#main_search1" ).val()},  
          beforeSend: function(){
            $("#main_search1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#main_search1").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });


    $( "#main_search1" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#city_find_form").submit();
        },2000);
      }
    });
    
     $( "#main_search2_state" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getstatelist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#main_search2_state" ).val()},  
          beforeSend: function(){
            $("#main_search2_state").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#main_search2_state").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });
     

    // $('#main_search2_state').keyup(function(){  
    //        var query = $('#main_search2_state').val();  
    //             $.ajax({  
    //                  url:"/getstatelist",  
    //                  method:"POST",
    //                  headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                  data:{query:query},  
    //                  beforeSend: function(){
    //                     $("#main_search2_state").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
    //                 },
    //                  success:function(data)  
    //                  {    
    //                       $('#state_box').html(data); 
    //                       $("#main_search2_state").css("background","#FFF");
    //                  }  
    //             });  
    //   });  
    //  $("#main_search2_state").bind('change', function () {
    //        $('#main_search2_state').blur();  
    //   }); 

     // $('#custom_state').keyup(function(){  
     //       var query = $('#custom_state').val();  
     //            $.ajax({  
     //                 url:"/getstatelist",  
     //                 method:"POST",
     //                 headers: {
     //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //                },
     //                 data:{query:query},  
     //                 beforeSend: function(){
     //        $("#custom_state").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#custom_box').html(data); 
     //                      $("#custom_state").css("background","#FFF");
     //                 }  
     //            });  
     //  });  
     // $("#custom_state").bind('change', function () {
     //       $('#custom_state').blur();  
     //  }); 

     $( "#custom_state" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getstatelist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#custom_state" ).val()},  
          beforeSend: function(){
            $("#custom_state").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#custom_state").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    // $('#main_search2_county').keyup(function(){  
    //        var query = $('#main_search2_county').val();  
    //             $.ajax({  
    //                  url:"/getcountylist",  
    //                  method:"POST",
    //                  headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },  
    //                  data:{query:query},  
    //                  beforeSend: function(){
    //                     $("#main_search2_county").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
    //                 },
    //                  success:function(data)  
    //                  {    
    //                       $('#county_box').html(data); 
    //                       $("#main_search2_county").css("background","#FFF");
    //                  }  
    //             });  
    //   });

    $( "#main_search2_county" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getcountylist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#main_search2_county" ).val()},  
          beforeSend: function(){
            $("#main_search2_county").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#main_search2_county").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    //  $("#main_search2_county").bind('change', function () {
    //        $('#main_search2_county').blur();  
    //   });

     // $('#col-search1').keyup(function(){  
     //       var query = $('#col-search1').val();  
     //            $.ajax({  
     //                 url:"/getsearchlist",  
     //                 method:"POST",
     //                 headers: {
     //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //                },
     //                 data:{query:query},  
     //                 beforeSend: function(){
     //        $("#col-search1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#data1').html(data); 
     //                      $("#col-search1").css("background","#FFF");
     //                 }  
     //            });  
     //  });  
     // $("#col-search1").bind('change', function () {
     //       $('#col-search1').blur();  
     //  }); 


     $( "#col-search1" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#col-search1" ).val()},  
          beforeSend: function(){
            $("#col-search1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#col-search1").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#col-search2" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#col-search2" ).val()},  
          beforeSend: function(){
            $("#col-search2").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#col-search2").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#col-search3" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#col-search3" ).val()},  
          beforeSend: function(){
            $("#col-search3").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#col-search3").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#custom_city" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getcountylist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#custom_city" ).val()},  
          beforeSend: function(){
            $("#custom_city").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#custom_city").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });


     $( "#modal-col-search1" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#modal-col-search1" ).val()},  
          beforeSend: function(){
            $("#modal-col-search1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#modal-col-search1").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

      $( "#modal-col-search2" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#modal-col-search2" ).val()},  
          beforeSend: function(){
            $("#modal-col-search2").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#modal-col-search2").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#modal-col-search3" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#modal-col-search3" ).val()},  
          beforeSend: function(){
            $("#modal-col-search3").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#modal-col-search3").css("background","#FFF");
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
            $("#map-search11").css("background","url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#map-search11").css("background","");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#map-search11" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#header_search_form").submit();
        },2000);
      }
    });

    $( "#map-search12" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#map-search12" ).val()},  
          beforeSend: function(){
            $("#map-search12").css("background","url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#map-search12").css("background","");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#map-search12" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#header_search_view_form").submit();
        },2000);
      }
    });

     // $('#map-search11').keyup(function(){  
     //       var query = $('#map-search11').val();  
     //        $.ajax({  
     //             url:"/getsearchlist",  
     //             method:"POST",
     //             headers: {
     //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //            },
     //             data:{query:query},  
     //             beforeSend: function(){
     //                $("#map-search11").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
     //            },
     //             success:function(data)  
     //             {    
     //                  $('#datab11').html(data); 
     //                  $("#map-search11").css("background","#006699");
     //             }  
     //        });  
     //  });  
     // $("#map-search11").bind('change', function () {
     //       $('#map-search11').blur(); 
     //  });

     

  //auto
   
 
     //  $('#search_focus7').keyup(function(){  
     //       var query = $('#search_focus7').val();  
     //            $.ajax({  
     //                 url:"/getnearestcity",  
     //                 method:"POST",
     //                 headers: {
     //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //                },  
     //                 data:{query:query},  
     //                 beforeSend: function(){
     //        $("#search_focus7").css("background","#FFF url(images/ajax-loader.gif) no-repeat 100px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#data7').html(data); 
     //                      $("#search_focus7").css("background","#FFF");
     //                 }  
     //            });  
     //  });  
     // $("#search_focus7").bind('change', function () {
     //       $('#search_focus7').blur();  
     //  });

     $( "#search_focus7" ).autocomplete({
      source: function(request, response){
        var query1 = $('#search_focus1').val();
        var query2 = $('#search_focus2').val();
        var query3 = $('#search_focus3').val();
        var query_region= $('#search_focus4').val();
        var query_county= $('#search_focus5').val();
        var query_nmc= $('#search_focus7').val();
        $.ajax({  
          url:"/getnearestcity",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#search_focus7" ).val(),
            query_multi_state : $("div.filter-option-inner-inner").text(),
            query1:query1,
            query2:query2,
            query3:query3,
            query_region:query_region, 
            query_county:query_county, 
            query_nmc:query_nmc,
          },  
          beforeSend: function(){
            $("#search_focus7").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#search_focus7").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#search_focus1" ).autocomplete({
      source: function(request, response){
        var query1 = $('#search_focus1').val();
        var query2 = $('#search_focus2').val();
        var query3 = $('#search_focus3').val();
        var query_region= $('#search_focus4').val();
        var query_county= $('#search_focus5').val();
        var query_nmc= $('#search_focus7').val();
        $.ajax({  
          url:"/getcitylist",
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#search_focus1" ).val(),
            query_multi_state : $("div.filter-option-inner-inner").text(),
            query2:query2,
            query3:query3,
            query_region:query_region, 
            query_county:query_county, 
            query_nmc:query_nmc,
          },  
          beforeSend: function(){
            $("#search_focus1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#search_focus1").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     //  $('#search_focus1').keyup(function(){  
     //    var query = $('#search_focus1').val();  
     //    $.ajax({  
     //         url:"/getcitylist",  
     //         method:"POST",
     //         headers: {
     //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //        },  
     //         data:{query:query},  
     //         beforeSend: function(){
     //        $("#search_focus1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 100px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#data1').html(data); 
     //                      $("#search_focus1").css("background","#FFF");
     //                 }  
     //            });  
     //  });  
     // $("#search_focus1").bind('change', function () {
     //       $('#search_focus1').blur();  
     //  });

     $( "#search_focus3" ).autocomplete({
      source: function(request, response){
        var query1 = $('#search_focus1').val();
        var query2 = $('#search_focus2').val();
        var query3 = $('#search_focus3').val();
        var query_region= $('#search_focus4').val();
        var query_county= $('#search_focus5').val();
        var query_nmc= $('#search_focus7').val();
        $.ajax({  
          url:"/getstatelist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#search_focus3" ).val(),
            query1:query1,
            query2:query2,
            query3:query3,
            query_region:query_region, 
            query_county:query_county, 
            query_nmc:query_nmc,
          },  
          beforeSend: function(){
            $("#search_focus3").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#search_focus3").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });
     

     // $('#search_focus3').keyup(function(){  
     //       var query = $('#search_focus3').val();  
     //            $.ajax({  
     //                 url:"/getstatelist",  
     //                 method:"POST",
     //                 headers: {
     //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //                },  
     //                 data:{query:query},  
     //                 beforeSend: function(){
     //        $("search_focus3").css("background","#FFF url(images/ajax-loader.gif) no-repeat 100px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#data3').html(data); 
     //                      $("#search_focus3").css("background","#FFF");
     //                 }  
     //            });  
     //  });  
     // $("#search_focus3").bind('change', function () {
     //       $('#search_focus3').blur();  
     //  }); 


     $( "#search_focus5" ).autocomplete({
      source: function(request, response){
        var query1 = $('#search_focus1').val();
        var query2 = $('#search_focus2').val();
        var query3 = $('#search_focus3').val();
        var query_region= $('#search_focus4').val();
        var query_county= $('#search_focus5').val();
        var query_nmc= $('#search_focus7').val();
        $.ajax({
          url:"/getcountylist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#search_focus5" ).val(),
            query_multi_state : $("div.filter-option-inner-inner").text(),
            query1:query1,
            query2:query2,
            query3:query3,
            query_region:query_region, 
            query_county:query_county, 
            query_nmc:query_nmc,
          },  
          beforeSend: function(){
            $("#search_focus5").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#search_focus5").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

     // $('#search_focus5').keyup(function(){  
     //       var query = $('#search_focus5').val();  
     //            $.ajax({  
     //                 url:"/getcountylist",  
     //                 method:"POST",
     //                 headers: {
     //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //                },  
     //                 data:{query:query},  
     //                 beforeSend: function(){
     //        $("#search_focus5").css("background","#FFF url(images/ajax-loader.gif) no-repeat 100px");
     //    },
     //                 success:function(data)  
     //                 {    
     //                      $('#data5').html(data); 
     //                      $("#search_focus5").css("background","#FFF");
     //                 }  
     //            });  
     //  });  
     // $("#search_focus5").bind('change', function () {
     //       $('#search_focus5').blur();
     //  });

     $( "#search_center_town" ).autocomplete({
      source: function(request, response){
        var query1 = $('#search_focus1').val();
        var query2 = $('#search_focus2').val();
        var query3 = $('#search_focus3').val();
        var query_region= $('#search_focus4').val();
        var query_county= $('#search_focus5').val();
        var query_nmc= $('#search_focus7').val();
        $.ajax({  
          url:"/getsearchlist",
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#search_center_town" ).val(),
            query_multi_state : $("div.filter-option-inner-inner").text(),
            query1:query1,
            query2:query2,
            query3:query3,
            query_region:query_region, 
            query_county:query_county, 
            query_nmc:query_nmc,
          },  
          beforeSend: function(){
            $("#search_center_town").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#search_center_town").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });


     $( "#street_view_city" ).autocomplete({
      source: function(request, response){
        var state = $("#street_view_state").val();
        $.ajax({  
          url:"/getcitylist",
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#street_view_city" ).val(),
            query3: state,
          },  
          beforeSend: function(){
            $("#street_view_city").css("background","url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#street_view_city").css("background","");
            response(JSON.parse(data));
          }
        });  
      }
    });

     $( "#street_view_state" ).autocomplete({
      source: function(request, response){
        var city = $("#street_view_city").val();
        $.ajax({  
          url:"/getstatelist",
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            query:$( "#street_view_state" ).val(),
            query1: city,
          },  
          beforeSend: function(){
            $("#street_view_state").css("background","url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#street_view_state").css("background","");
            response(JSON.parse(data));
          }
        });  
      }
    });



    $("#search_center_town").bind('change', function () {
      $('#search_center_town').blur();  
    });
     $("#btn_monthly_premium").click(function(){
        $("#premium_type").val("monthly");
        $("#payment_amount").val("8.95");
     });

     $("#btn_daily_premium").click(function(){
        $("#premium_type").val("daily");
        $("#payment_amount").val("4.95");
     });

     $("#btn_annual_premium").click(function(){
        $("#premium_type").val("annual");
        $("#payment_amount").val("89.95");
     });
     
});  