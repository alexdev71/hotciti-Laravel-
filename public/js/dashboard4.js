
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
                     
                     var sunny_days = [];
                    var ppt = [];
                    var rain = [];
                    var snow = [];
                    var julys = [];
                    var jans = [];
                    
                     
                    for (var i in data) {
                        city.push(data[i].City_State_Combined);
                        
                       sunny_days.push(data[i].Sunny_Days);
                      ppt.push(data[i].Precipitation_Days);
                      rain.push(data[i].Rainfall_in_);
                      snow.push(data[i].Snowfall_in_);
                      julys.push(data[i].Avg__July_High);
                      jans.push(data[i].Avg__Jan__Low);
                      
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




//pie weather start
Highcharts.chart('sunny', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Sunny Days'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}days'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}days</b> of total<br/>'
  },

  series: [
    {
      name: "Sunny Days",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +sunny_days[0]
        },
        {
          name: city[1],
          y: +sunny_days[1]
        },
        {
          name: city[2],
          y: +sunny_days[2]
        } 
      ]
    }
  ]
});
//pie sunny end
// pie ppt start
Highcharts.chart('pie1', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Precipitation Days'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}days'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}days</b> of total<br/>'
  },

  series: [
    {
      name: "Precipitation Days",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +ppt[0]
        },
        {
          name: city[1],
          y: +ppt[1]
        },
        {
          name: city[2],
          y: +ppt[2]
        } 
      ]
    }
  ]
});


//pie ppt end
//pie rain start
Highcharts.chart('rain', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Rainfall (in)'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}in'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}in</b> of total<br/>'
  },

  series: [
    {
      name: "Rainfall",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +rain[0]
        },
        {
          name: city[1],
          y: +rain[1]
        },
        {
          name: city[2],
          y: +rain[2]
        } 
      ]
    }
  ]
});

//pie rain ends
//pie snow start
Highcharts.chart('snow', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Snow Fall (in)'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}in'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}in</b> of total<br/>'
  },

  series: [
    {
      name: "Snow Fall",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +snow[0]
        },
        {
          name: city[1],
          y: +snow[1]
        },
        {
          name: city[2],
          y: +snow[2]
        } 
      ]
    }
  ]
});

//pie snow end
//pie july start
Highcharts.chart('july', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Avg July High'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}oF'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}oF</b> of total<br/>'
  },

  series: [
    {
      name: "Avg July High",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +julys[0]
        },
        {
          name: city[1],
          y: +julys[1]
        },
        {
          name: city[2],
          y: +julys[2]
        } 
      ]
    }
  ]
});

//pie july end
//pie jan start
Highcharts.chart('jan', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Average January Low'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}C'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}C</b> of total<br/>'
  },

  series: [
    {
      name: "Average January Low",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +jans[0]
        },
        {
          name: city[1],
          y: +jans[1]
        },
        {
          name: city[2],
          y: +jans[2]
        } 
      ]
    }
  ]
});

//pie jan end
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






                    