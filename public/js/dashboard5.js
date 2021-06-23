
$(document).ready(function(){

    load_data(1);

    function load_data(query1 = '', query2 = '',query3 = '')
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
        success: function(data) {
            console.log(data);
                     var city = [];
                     
                     var vio_crime = [];
                     var pro_crime = [];
                    
                     
                    for (var i in data) {
                        city.push(data[i].City_State_Combined);
                        
                       vio_crime.push(data[i].Violent_Crime);
                       pro_crime.push(data[i].Property_Crime);
                      
                    }

//pie vio start
Highcharts.chart('vio', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Violent Crime'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Violent Crime",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +vio_crime[0]
        },
        {
          name: city[1],
          y: +vio_crime[1]
        },
        {
          name: city[2],
          y: +vio_crime[2]
        } 
      ]
    }
  ]
});

//pie vio end
// pie pro start
Highcharts.chart('pro', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Property Crime'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Property Crime",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +pro_crime[0]
        },
        {
          name: city[1],
          y: +pro_crime[1]
        },
        {
          name: city[2],
          y: +pro_crime[2]
        } 
      ]
    }
  ]
});

//pie pro end

//end



        }
    });
//});
     
    }


    $('#fetch_graph1').bind("change", function(){
      var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      load_data(1, query1,query2,query3);
    });

    $('#fetch_graph2').bind("change", function(){
     var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      load_data(1, query1,query2,query3);
    });

     $('#fetch_graph3').bind("change", function(){
     var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      load_data(1, query1,query2,query3);
    });
   
    });






                    