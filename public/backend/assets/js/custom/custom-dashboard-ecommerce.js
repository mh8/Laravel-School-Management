/*
-------------------------------------------
    : Custom - Dashboard Ecommerce js :
-------------------------------------------
*/
"use strict";
$(document).ready(function() {
	/* -- Vector Map -- */
    $('#world-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        markerStyle: {
          initial: {
            fill: '#0080ff',
            stroke: '#0080ff',
            "fill-opacity": 1,
            "stroke-width": 15,
            "stroke-opacity": 0.2
          }
        },
        markers: [
          {latLng: [37.18, -93.35], name: 'United States'},
          {latLng: [61.52, 105.31], name: 'Russia'},          
          {latLng: [-25.27, 133.77], name: 'Australia'},
          {latLng: [-38.41, -63.61], name: 'Argentina'},
          {latLng: [20.59, 78.96], name: 'India'},          
        ],
        focusOn: {
          x: 0,
          y: 0,
          scale: 1
        },
        
        regionStyle: {
            initial: {
                fill: '#d4d8de'
            }
        }
    });    
    /* -- Apex Pie Chart -- */
    var options = {
        chart: {
            type: 'donut',
            width: 240,
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "85%"
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#0080ff','#18d26b','#d4d8de'],
        series: [60, 45, 25],
        labels: ['Gadget', 'Fashion', 'Food'],
        legend: {
            show: true,
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 420,
            options: {
                chart: {
                    width: 220,
                },
            },
        }]
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-pie-chart"),
        options
    );        
    chart.render();
    /* Apex Stacked Bar Chart */
    var options = {
        chart: {
            height: 260,
            type: 'bar',
            stacked: true,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '20%',
            },
        },
        colors: ['#0080ff','#d4d8de'],
        series: [{
            name: 'Earning',
            data: [5, 7, 8, 6, 7, 5, 6, 6, 7, 4]
        },{
            name: 'Paid',
            data: [5, 4, 4, 5, 3, 4, 3, 5, 4, 6]
        }],        
        xaxis: {
            type: 'datetime',
            categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT', '01/05/2011 GMT', '01/06/2011 GMT', '01/07/2011 GMT', '01/08/2011 GMT', '01/09/2011 GMT', '01/10/2011 GMT'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        legend: {
            show: false
        },
        fill: {
            opacity: 1
        },
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-stacked-bar-chart"),
        options
    );        
    chart.render();
    /* -----  Apex Area Chart ----- */
    var options = {
        chart: {
            type:"area",
            height: 135,
            sparkline: {
                enabled: true
            }
        }
        ,
        stroke: {
            curve: "smooth", 
            width: 3
        }
        ,
        fill: {
            opacity: .05
        }
        ,
        series:[ {
            data: [15, 8, 12, 6, 10, 16, 5, 11, 6]
        }
        ],
        yaxis: {
            min: 0
        }
        ,
        colors:["#0080ff"],
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'transparent'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-area-chart"),
        options
    );
    chart.render();
    /* Best Product Slider */
    $('.best-product-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="feather icon-chevron-left"></i>',
        nextArrow: '<i class="feather icon-chevron-right"></i>'
    });
});