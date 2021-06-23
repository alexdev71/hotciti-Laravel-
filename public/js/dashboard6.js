
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
                     
                    var dem = [];
                    var rep = [];
                    var inde = [];
           
                    for (var i in data) {
                        city.push(data[i].City_State_Combined);
                        
                      dem.push(data[i].Democrat);
                      rep.push(data[i].Republican);
                      inde.push(data[i].Independent_Other);
                    }


//start
//married population

//married population ends
// single population

//single population ends
//unemployment pie

//unemployment pie end
//home price bar

//home price bar end
//pie tax start

//pie tax end
// male pop start

//male pop end




//pie dem start
Highcharts.chart('dem', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Democrats'
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
      name: "Democrats",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +dem[0]
        },
        {
          name: city[1],
          y: +dem[1]
        },
        {
          name: city[2],
          y: +dem[2]
        } 
      ]
    }
  ]
});

//pie dem end
// pie rep start
Highcharts.chart('rep', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Republican'
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
      name: "Republican",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +rep[0]
        },
        {
          name: city[1],
          y: +rep[1]
        },
        {
          name: city[2],
          y: +rep[2]
        } 
      ]
    }
  ]
});

//pie rep end
//pie inde start
Highcharts.chart('inde', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Independent / Others'
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
      name: "Independent / Others",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +inde[0]
        },
        {
          name: city[1],
          y: +inde[1]
        },
        {
          name: city[2],
          y: +inde[2]
        } 
      ]
    }
  ]
});

//pie inde ends

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






                    