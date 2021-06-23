Highcharts.Legend.prototype.colorizeItem = function(item, visible) {
  item.legendGroup[visible ? 'removeClass' : 'addClass']('highcharts-legend-item-hidden');
  if (!this.chart.styledMode) {
    var legend = this,
      options = legend.options,
      legendItem = item.legendItem,
      legendLine = item.legendLine,
      legendSymbol = item.legendSymbol,
      hiddenColor = legend.itemHiddenStyle.color,
      textColor = visible ?
      options.itemStyle.color :
      hiddenColor,
      symbolColor = visible ?
      (item.color || hiddenColor) :
      hiddenColor,
      markerOptions = item.options && item.options.marker,
      symbolAttr = {
        fill: symbolColor
      };
    if (legendItem) {
      legendItem.css({
        fill: textColor,
        color: textColor // #1553, oldIE
      });
    }
    if (legendLine) {
      legendLine.attr({
        stroke: symbolColor
      });
    }
    if (legendSymbol) {
      // Apply marker options
      if (markerOptions) { // #585

        symbolAttr = item.pointAttribs();
        if (!visible) {
          // #6769
          symbolAttr.stroke = symbolAttr.fill = hiddenColor;
        }
      }
      legendSymbol.attr(symbolAttr);
    }
  }
  Highcharts.fireEvent(this, 'afterColorizeItem', {
    item: item,
    visible: visible
  });
}


// Uncomment to style it like Apple Watch
/*
if (!Highcharts.theme) {
    Highcharts.setOptions({
        chart: {
            backgroundColor: 'black'
        },
        colors: ['#F62366', '#9DFF02', '#0CCDD6'],
        title: {
            style: {
                color: 'silver'
            }
        },
        tooltip: {
            style: {
                color: 'silver'
            }
        }
    });
}
// */

/**
 * In the chart render event, add icons on top of the circular shapes
 */
function renderIcons() {

  // Move icon
  if (!this.series[0].icon) {
    this.series[0].icon = this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8])
      .attr({
        stroke: '#303030',
        'stroke-linecap': 'round',
        'stroke-linejoin': 'round',
        'stroke-width': 2,
        zIndex: 10
      })
      .add(this.series[2].group);
  }
  this.series[0].icon.translate(
    this.chartWidth / 2 - 10,
    this.plotHeight / 2 - this.series[0].points[0].shapeArgs.innerR -
    (this.series[0].points[0].shapeArgs.r - this.series[0].points[0].shapeArgs.innerR) / 2
  );

  // Exercise icon
  if (!this.series[1].icon) {
    this.series[1].icon = this.renderer.path(
        ['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8,
          'M', 8, -8, 'L', 16, 0, 8, 8
        ]
      )
      .attr({
        stroke: '#ffffff',
        'stroke-linecap': 'round',
        'stroke-linejoin': 'round',
        'stroke-width': 2,
        zIndex: 10
      })
      .add(this.series[2].group);
  }
  this.series[1].icon.translate(
    this.chartWidth / 2 - 10,
    this.plotHeight / 2 - this.series[1].points[0].shapeArgs.innerR -
    (this.series[1].points[0].shapeArgs.r - this.series[1].points[0].shapeArgs.innerR) / 2
  );

  // Stand icon
  if (!this.series[2].icon) {
    this.series[2].icon = this.renderer.path(['M', 0, 8, 'L', 0, -8, 'M', -8, 0, 'L', 0, -8, 8, 0])
      .attr({
        stroke: '#303030',
        'stroke-linecap': 'round',
        'stroke-linejoin': 'round',
        'stroke-width': 2,
        zIndex: 10
      })
      .add(this.series[2].group);
  }

  this.series[2].icon.translate(
    this.chartWidth / 2 - 10,
    this.plotHeight / 2 - this.series[2].points[0].shapeArgs.innerR -
    (this.series[2].points[0].shapeArgs.r - this.series[2].points[0].shapeArgs.innerR) / 2
  );
}

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
                     var population = [];
                     var median_income = [];
                     var median_age = [];
                     var ahome_price = [];
                     var uemp_rate = [];
                     var comm_time = [];
                    var sunny_days = [];
                    var ppt = [];
                    var rain = [];
                    var snow = [];
                    var julys = [];
                    var jans = [];
                     var vio_crime = [];
                     var pro_crime = [];
                     var mpop = [];
                     var sale_tax = [];
                     var prt_tax = [];
                     var inc_tax = [];
                     var single = [];
                     var married = [];
                     
                    for (var i in data) {
                        city.push(data[i].City_State_Combined);
                        population.push(data[i].Population);
                        median_income.push(data[i].Household_Income);
                        median_age.push(data[i].Median_Age);
                        ahome_price.push(data[i].Median_Home_Cost);
                       uemp_rate.push(data[i].Unemployment_Rate);
                        comm_time.push(data[i].Commute_Time);
                      sunny_days.push(data[i].Sunny_Days);
                      ppt.push(data[i].Precipitation_Days);
                      rain.push(data[i].Rainfall_in_);
                      snow.push(data[i].Snowfall_in_);
                      julys.push(data[i].Avg__July_High);
                      jans.push(data[i].Avg__Jan__Low);
                       vio_crime.push(data[i].Violent_Crime);
                       pro_crime.push(data[i].Property_Crime);
                       mpop.push(data[i].Male_Population);
                       sale_tax.push(data[i].Sales_Taxes);
                       prt_tax.push(data[i].Property_Tax_Rate);
                       inc_tax.push(data[i].Income_Taxes);
                       single.push(data[i].Single_Population);
                       married.push(data[i].Married_Population);
                    }

var crime0 = parseInt(vio_crime[0])+parseInt(pro_crime[0]);
var crime1 = parseInt(vio_crime[1])+parseInt(pro_crime[1]);
var crime2 = parseInt(vio_crime[2])+parseInt(pro_crime[2]);
//console.log(crime0);
var weather0 = parseInt(sunny_days[0])+parseInt(ppt[0])+parseInt(rain[0])+parseInt(snow[0])+parseInt(julys[0])+parseInt(jans[0]);
var weather1 = parseInt(sunny_days[1])+parseInt(ppt[1])+parseInt(rain[1])+parseInt(snow[1])+parseInt(julys[1])+parseInt(jans[1]);
var weather2 = parseInt(sunny_days[2])+parseInt(ppt[2])+parseInt(rain[2])+parseInt(snow[2])+parseInt(julys[2])+parseInt(jans[2]);
//taxes
var tax0 = parseInt(sale_tax[0])+parseInt(prt_tax[0])+parseInt(inc_tax[0]);
var tax1 = parseInt(sale_tax[1])+parseInt(prt_tax[1])+parseInt(inc_tax[1]);
var tax2 = parseInt(sale_tax[2])+parseInt(prt_tax[2])+parseInt(inc_tax[2]);
//start
//married population
Highcharts.chart('single2', {
  chart: {
    type: 'solidgauge',
    height: '85%',
    events: {
      render: renderIcons
    }
  },
  legend: {
    enabled: true
  },
  title: {
    text: 'Married Population',
    style: {
      fontSize: '24px'
    }
  },

  tooltip: {
    borderWidth: 0,
    backgroundColor: 'none',
    shadow: false,
    style: {
      fontSize: '16px'
    },
    pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
    positioner: function(labelWidth) {
      return {
        x: (this.chart.chartWidth - labelWidth) / 2,
        y: (this.chart.plotHeight / 2) + 15
      };
    }
  },

  pane: {
    startAngle: 0,
    endAngle: 360,
    background: [{ // Track for Move
      outerRadius: '75%',
      innerRadius: '88%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Exercise
      outerRadius: '87%',
      innerRadius: '63%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Stand
      outerRadius: '62%',
      innerRadius: '38%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }]
  },

  yAxis: {
    min: 0,
    max: 100,
    lineWidth: 0,
    tickPositions: []
  },

  plotOptions: {
    solidgauge: {
      dataLabels: {
        enabled: false
      },
      linecap: 'round',
      stickyTracking: false,
      rounded: true,
      showInLegend: true
    }
  },

  series: [{
    name: city[0],
    marker: {
      fillColor: Highcharts.getOptions().colors[0]
    },
    data: [{
      color: Highcharts.getOptions().colors[0],
      radius: '112%',
      innerRadius: '88%',
      y: +married[0]
    }]
  }, {
    name: city[1],
    marker: {
      fillColor: Highcharts.getOptions().colors[1]
    },
    data: [{
      color: Highcharts.getOptions().colors[1],
      radius: '87%',
      innerRadius: '63%',
      y: +married[1]
    }]
  }, {
    name: city[2],
    marker: {
      fillColor: Highcharts.getOptions().colors[2]
    },
    data: [{
      color: Highcharts.getOptions().colors[2],
      radius: '62%',
      y: +married[2],
      innerRadius: '38%',

    }]
  }]
});
//married population ends
// single population
Highcharts.chart('single1', {
  chart: {
    type: 'solidgauge',
    height: '85%',
    events: {
      render: renderIcons
    }
  },
  legend: {
    enabled: true
  },
  title: {
    text: 'Single Population',
    style: {
      fontSize: '24px'
    }
  },

  tooltip: {
    borderWidth: 0,
    backgroundColor: 'none',
    shadow: false,
    style: {
      fontSize: '16px'
    },
    pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
    positioner: function(labelWidth) {
      return {
        x: (this.chart.chartWidth - labelWidth) / 2,
        y: (this.chart.plotHeight / 2) + 15
      };
    }
  },

  pane: {
    startAngle: 0,
    endAngle: 360,
    background: [{ // Track for Move
      outerRadius: '75%',
      innerRadius: '88%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Exercise
      outerRadius: '87%',
      innerRadius: '63%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Stand
      outerRadius: '62%',
      innerRadius: '38%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }]
  },

  yAxis: {
    min: 0,
    max: 100,
    lineWidth: 0,
    tickPositions: []
  },

  plotOptions: {
    solidgauge: {
      dataLabels: {
        enabled: false
      },
      linecap: 'round',
      stickyTracking: false,
      rounded: true,
      showInLegend: true
    }
  },

  series: [{
    name: city[0],
    marker: {
      fillColor: Highcharts.getOptions().colors[0]
    },
    data: [{
      color: Highcharts.getOptions().colors[0],
      radius: '112%',
      innerRadius: '88%',
      y: +single[0]
    }]
  }, {
    name: city[1],
    marker: {
      fillColor: Highcharts.getOptions().colors[1]
    },
    data: [{
      color: Highcharts.getOptions().colors[1],
      radius: '87%',
      innerRadius: '63%',
      y: +single[1]
    }]
  }, {
    name: city[2],
    marker: {
      fillColor: Highcharts.getOptions().colors[2]
    },
    data: [{
      color: Highcharts.getOptions().colors[2],
      radius: '62%',
      y: +single[2],
      innerRadius: '38%',

    }]
  }]
});
//single population ends
//unemployment pie
Highcharts.chart('price1', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Unemployment Rate'
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
      name: "Unemployment Rate",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +uemp_rate[0]
        },
        {
          name: city[1],
          y: +uemp_rate[1]
        },
        {
          name: city[2],
          y: +uemp_rate[2]
        } 
      ]
    }
  ]
});
//unemployment pie end
//home price bar
Highcharts.chart('price2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Average Home Price'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Cities'],
        align: 'high',
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Avg. Home Price',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -5,
        y: 20,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: city[0],
        data: [+ahome_price[0]]
    }, {
        name: city[1],
        data: [+ahome_price[1]]
    }, {
        name: city[2],
        data: [+ahome_price[2]]
    }]
});
//home price bar end
//pie tax start
Highcharts.chart('line2', {
	credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Tax Rates'
  },
  subtitle: {
    text: 'Sales + Income + Property Taxes (click slices to drilldown)'
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Total Tax Rates)",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +tax0,
          drilldown: city[0]
        },
        {
          name: city[1],
          y: +tax1,
          drilldown: city[1]
        },
        {
          name: city[2],
          y: +tax2,
          drilldown: city[2]
        } 
      ]
    }
  ],
  drilldown: {
    series: [
      {
        name: city[0],
        id: city[0],
        data: [
          [
            "Sales Taxe Rate",
            +sale_tax[0]
          ],
          [
            "Income Taxe Rate",
            +inc_tax[0]
          ],
          [
            "Property Tax Rate",
            +prt_tax[0]
          ]
        ]
      },
      {
        name: city[1],
        id: city[1],
        data: [
          [
            "Sales Taxe Rate",
            +sale_tax[1]
          ],
          [
            "Income Taxe Rate",
            +inc_tax[1]
          ],
          [
            "Property Tax Rate",
            +prt_tax[1]
          ]
        ]
      },
      {
       name: city[2],
        id: city[2],
        data: [
          [
            "Sales Taxe Rate",
            +sale_tax[2]
          ],
          [
            "Income Taxe Rate",
            +inc_tax[2]
          ],
          [
            "Property Tax Rate",
            +prt_tax[2]
          ]
        ]
      }
      
    ]
  }
});
//pie tax end
// male pop start
Highcharts.chart('round', {
  chart: {
    type: 'solidgauge',
    height: '85%',
    events: {
      render: renderIcons
    }
  },
  legend: {
    enabled: true
  },
  title: {
    text: '% Male Population',
    style: {
      fontSize: '24px'
    }
  },

  tooltip: {
    borderWidth: 0,
    backgroundColor: 'none',
    shadow: false,
    style: {
      fontSize: '16px'
    },
    pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
    positioner: function(labelWidth) {
      return {
        x: (this.chart.chartWidth - labelWidth) / 2,
        y: (this.chart.plotHeight / 2) + 15
      };
    }
  },

  pane: {
    startAngle: 0,
    endAngle: 360,
    background: [{ // Track for Move
      outerRadius: '75%',
      innerRadius: '88%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Exercise
      outerRadius: '87%',
      innerRadius: '63%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Stand
      outerRadius: '62%',
      innerRadius: '38%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }]
  },

  yAxis: {
    min: 0,
    max: 100,
    lineWidth: 0,
    tickPositions: []
  },

  plotOptions: {
    solidgauge: {
      dataLabels: {
        enabled: false
      },
      linecap: 'round',
      stickyTracking: false,
      rounded: true,
      showInLegend: true
    }
  },

  series: [{
    name: city[0],
    marker: {
      fillColor: Highcharts.getOptions().colors[0]
    },
    data: [{
      color: Highcharts.getOptions().colors[0],
      radius: '112%',
      innerRadius: '88%',
      y: +mpop[0]
    }]
  }, {
    name: city[1],
    marker: {
      fillColor: Highcharts.getOptions().colors[1]
    },
    data: [{
      color: Highcharts.getOptions().colors[1],
      radius: '87%',
      innerRadius: '63%',
      y: +mpop[1]
    }]
  }, {
    name: city[2],
    marker: {
      fillColor: Highcharts.getOptions().colors[2]
    },
    data: [{
      color: Highcharts.getOptions().colors[2],
      radius: '62%',
      y: +mpop[2],
      innerRadius: '38%',

    }]
  }]
});
//male pop end
//pie weather start
Highcharts.chart('container2', {
	credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Weather'
  },
  subtitle: {
    text: 'Avg. July High + Avg. Jan Low (click slices to drilldown)'
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
  },

  series: [
    {
      name: "Average Weather",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +weather0,
          drilldown: city[0]
        },
        {
          name: city[1],
          y: +weather1,
          drilldown: city[1]
        },
        {
          name: city[2],
          y: +weather2,
          drilldown: city[2]
        } 
      ]
    }
  ],
  drilldown: {
    series: [
      {
        name: city[0],
        id: city[0],
        data: [
          [
            "Sunny Days",
            +sunny_days[0]
          ],
          [
            "Precipitation",
            +ppt[0]
          ],
          [
            "Rainfall",
            +rain[0]
          ],
          [
            "Snowfall (In)",
            +snow[0]
          ],
          [
            "Avg. July High",
            +julys[0]
          ],
          [
            "Avg. Jan Low",
            +jans[0]
          ]
        ]
      },
      {
        name: city[1],
        id: city[1],
        data: [
        [
            "Sunny Days",
            +sunny_days[1]
          ],
          [
            "Precipitation",
            +ppt[1]
          ],
          [
            "Rainfall",
            +rain[1]
          ],
          [
            "Snowfall (In)",
            +snow[1]
          ],
          [
            "Avg. July High",
            +julys[1]
          ],
          [
            "Avg. Jan Low",
            +jans[1]
          ]
        ]
      },
      {
       name: city[2],
        id: city[2],
        data: [
          [
            "Sunny Days",
            +sunny_days[2]
          ],
          [
            "Precipitation",
            +ppt[2]
          ],
          [
            "Rainfall",
            +rain[2]
          ],
          [
            "Snowfall (In)",
            +snow[2]
          ],
          [
            "Avg. July High",
            +julys[2]
          ],
          [
            "Avg. Jan Low",
            +jans[2]
          ]
        ]
      }
      
    ]
  }
});
//pie weather end
// line chart start
Highcharts.chart('container1', {
	credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Crimes'
  },
  subtitle: {
    text: 'Property + Violent Crime (click slices to drilldown)'
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
      name: "Total Crime (Property + Violent Crime)",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +crime0,
          drilldown: city[0]
        },
        {
          name: city[1],
          y: +crime1,
          drilldown: city[1]
        },
        {
          name: city[2],
          y: +crime2,
          drilldown: city[2]
        } 
      ]
    }
  ],
  drilldown: {
    series: [
      {
        name: city[0],
        id: city[0],
        data: [
          [
            "Violent Crime",
            +vio_crime[0]
          ],
          [
            "Property Crime",
            +pro_crime[0]
          ]
        ]
      },
      {
        name: city[1],
        id: city[1],
        data: [
          [
            "Violent Crime",
            +vio_crime[1]
          ],
          [
            "Property Crime",
            +pro_crime[1]
          ]
        ]
      },
      {
       name: city[2],
        id: city[2],
        data: [
          [
            "Violent Crime",
            +vio_crime[2]
          ],
          [
            "Property Crime",
            +pro_crime[2]
          ]
        ]
      }
      
    ]
  }
});
//line chart end
//pie median income start
Highcharts.chart('pie1', {
    credits: {
    enabled: false
},
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Median Income'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}$'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$</b> of total<br/>'
  },

  series: [
    {
      name: "Median Income",
      colorByPoint: true,
      data: [
        {
          name: city[0],
          y: +median_income[0]
        },
        {
          name: city[1],
          y: +median_income[1]
        },
        {
          name: city[2],
          y: +median_income[2]
        } 
      ]
    }
  ]
});
//pie ends
//graph dnut start
Highcharts.chart('dnut', {
    credits: {
    enabled: false
},
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: 0,
    plotShadow: false
  },
  title: {
    text: '<br><br><br><br><br>Commute<br>Time',
    align: 'center',
    verticalAlign: 'middle',
    y: 40
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}mins</b>'
  },
  plotOptions: {
    pie: {
      dataLabels: {
        enabled: true,
        distance: -50,
        style: {
          fontWeight: 'bold',
          color: 'white'
        }
      },
      startAngle: -90,
      endAngle: 90,
      center: ['50%', '75%'],
      size: '100%'
    }
  },
  series: [{
    type: 'pie',
    name: 'Commute Time',
    innerSize: '50%',
    data: [
      [city[0], +comm_time[0]],
      [city[1], +comm_time[1]],
      [city[2], +comm_time[2]]
    ]
  }]
});
//graph dnut end
//bar chart start
Highcharts.chart('line1', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Population'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Cities'],
        align: 'high',
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -5,
        y: 20,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: city[0],
        data: [+population[0]]
    }, {
        name: city[1],
        data: [+population[1]]
    }, {
        name: city[2],
        data: [+population[2]]
    }]
});
//bar chart end
//graph start round
Highcharts.chart('round1', {
  chart: {
    type: 'solidgauge',
    height: '85%',
    events: {
      render: renderIcons
    }
  },
  legend: {
    enabled: true
  },
  title: {
    text: 'Median Age',
    style: {
      fontSize: '24px'
    }
  },

  tooltip: {
    borderWidth: 0,
    backgroundColor: 'none',
    shadow: false,
    style: {
      fontSize: '16px'
    },
    pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
    positioner: function(labelWidth) {
      return {
        x: (this.chart.chartWidth - labelWidth) / 2,
        y: (this.chart.plotHeight / 2) + 15
      };
    }
  },

  pane: {
    startAngle: 0,
    endAngle: 360,
    background: [{ // Track for Move
      outerRadius: '75%',
      innerRadius: '88%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Exercise
      outerRadius: '87%',
      innerRadius: '63%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }, { // Track for Stand
      outerRadius: '62%',
      innerRadius: '38%',
      backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
        .setOpacity(0.3)
        .get(),
      borderWidth: 0
    }]
  },

  yAxis: {
    min: 0,
    max: 100,
    lineWidth: 0,
    tickPositions: []
  },

  plotOptions: {
    solidgauge: {
      dataLabels: {
        enabled: false
      },
      linecap: 'round',
      stickyTracking: false,
      rounded: true,
      showInLegend: true
    }
  },

  series: [{
    name: city[0],
    marker: {
      fillColor: Highcharts.getOptions().colors[0]
    },
    data: [{
      color: Highcharts.getOptions().colors[0],
      radius: '112%',
      innerRadius: '88%',
      y: +median_age[0]
    }]
  }, {
    name: city[1],
    marker: {
      fillColor: Highcharts.getOptions().colors[1]
    },
    data: [{
      color: Highcharts.getOptions().colors[1],
      radius: '87%',
      innerRadius: '63%',
      y: +median_age[1]
    }]
  }, {
    name: city[2],
    marker: {
      fillColor: Highcharts.getOptions().colors[2]
    },
    data: [{
      color: Highcharts.getOptions().colors[2],
      radius: '62%',
      y: +median_age[2],
      innerRadius: '38%',

    }]
  }]
});
//graph round end
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






                    