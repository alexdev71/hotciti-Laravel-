'use strict';
function legendClickCallback(event) {
    event = event || window.event;

    var target = event.target || event.srcElement;
    while (target.nodeName !== 'LI') {
        target = target.parentElement;
    }
    var parent = target.parentElement;
    var chartId = parseInt(parent.classList[0].split("-")[0], 10);
    var chart = Chart.instances[chartId];
    var index = Array.prototype.slice.call(parent.children).indexOf(target);
    var meta = chart.getDatasetMeta(index);
    if (meta.hidden === null) {
        meta.hidden = !chart.data.datasets[index].hidden;
        target.classList.add('hidden-lable');
    } else {
        target.classList.remove('hidden-lable');
        meta.hidden = null;
    }
    chart.update();
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
            var entertainment = [];
            var food = [];
            var income_taxes = [];
            var mortgage = [];
            var property_tax_rate = [];
            var sales_tax = [];
            var utilities = [];

            for (var i in data) {
                city.push(data[i].City_State_Combined);
                entertainment.push(data[i].Miscellaneous);
                food.push(data[i].Food);
                income_taxes.push(data[i].Income_Taxes);
                mortgage.push(data[i].Median_Home_Cost);
                property_tax_rate.push(data[i].Property_Tax_Rate);
                sales_tax.push(data[i].Sales_Taxes);
                utilities.push(data[i].Utilities);
            }
//console.log(city);

//start
var config = {

    type: 'line',
    data: {
        labels: ['Entertainment', 'Food', 'Income Taxes', 'Mortgage', 'Property Tax Rate', 'Sales Tax', 'Utilities'],
        datasets: [{
                label: city[0],
                fill: true,
                animation: false,
                backgroundColor: "rgba(94, 207, 177, 0.2)",
                borderColor: "#5ECFB1",
                pointBackgroundColor:"#fff",
                pointBorderWidth: 1,
                pointBorderColor: "#5ECFB1",
                pointHoverBorderWidth: 1,
                data: [entertainment[0]/10, food[0]/10, income_taxes[0], mortgage[0]/10000, property_tax_rate[0], sales_tax[0], utilities[0]/10]
            },
            {
                label: city[1],
                fill: true,
                animation: false,
                backgroundColor: "rgba(77, 183, 254, 0.2)",
                borderColor: "#4DB7FE",
                pointBackgroundColor:"#fff",
                pointBorderWidth: 1,
                pointBorderColor: "#4DB7FE",
                pointBorderWidth: 1,
                pointHoverBorderWidth: 1,

                data: [entertainment[1]/10, food[1]/10, income_taxes[1], mortgage[1]/10000, property_tax_rate[1], sales_tax[1], utilities[1]/10]
            },
            {
                label: city[2],
                fill: true,
                animation: false,
                backgroundColor: "rgba(77, 183, 254, 0.2)",
                borderColor: "red",
                pointBackgroundColor:"#fff",
                pointBorderWidth: 1,
                pointBorderColor: "#4DB7FE",
                pointBorderWidth: 1,
                pointHoverBorderWidth: 1,

                data: [entertainment[2]/10, food[2]/10, income_taxes[2], mortgage[2]/10000, property_tax_rate[2], sales_tax[2], utilities[2]/10]
            },
        ]
    },
    options: {
        legend: {
            display: true
        },
        hover: {
            onHover: function (e) {
                var point = this.getElementAtEvent(e);
                if (point.length) e.target.style.cursor = 'pointer';
                else e.target.style.cursor = 'default';
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "rgba(0,0,0,0.2)",
                    fontStyle: "bold",
                    beginAtZero: true,

                    padding: 20
                },
                gridLines: {

                    display: true,
                    zeroLineColor: "transparent"
                }

            }],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }],

        },
        tooltips: {
            backgroundColor: "rgba(0,0,0,0.6)",
            titleMarginBottom: 10,
            footerMarginTop: 6,
            xPadding: 22,
            yPadding: 12
        }
       }
     };
var ctx = document.getElementById("canvas-chart");
var myLegendContainer = document.getElementById("myChartLegend");

var myChart = new Chart(ctx, config);
if(myLegendContainer){
    myLegendContainer.innerHTML = myChart.generateLegend();
    var legendItems = myLegendContainer.getElementsByTagName('li');
    for (var i = 0; i < legendItems.length; i += 1) {
        legendItems[i].addEventListener("click", legendClickCallback, false);
    }
}
$(".submenu-link").on("click", function (e) {
    e.preventDefault();
    $(this).parent("li").toggleClass("submenu-act").find("ul").slideToggle(500);
});
//end



        }
    });
//});
     
    }


    $('#fetch_graph1').change(function(){
      var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      load_data(1, query1,query2,query3);
    });

    $('#fetch_graph2').change(function(){
     var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      load_data(1, query1,query2,query3);
    });

     $('#fetch_graph3').change(function(){
     var query1 = $('#fetch_graph1').val();
     var query2 = $('#fetch_graph2').val();
     var query3 = $('#fetch_graph3').val();
      load_data(1, query1,query2,query3);
    });
   
    });






                    