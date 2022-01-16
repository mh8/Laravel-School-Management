/*
----------------------------------------------
    : Custom - Dashboard CRM js :
----------------------------------------------
*/
"use strict";
$(document).ready(function() {    
    /* -----  Apex Line Chart ----- */
    var options = {
        chart: {
            height: 250,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
              type: 'x',
              enabled: false,
              autoScaleYaxis: true
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
        },
        colors: ['#0080ff', '#d4d8de'],
        series: [{
            name: 'Inward',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'Outward',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
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
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-line-chart"),
        options
    );
    chart.render();
    /* -----  Apex Bar Chart ----- */
    var options = {
        chart: {
            height: 362,
            type: 'bar',
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '25%',
                endingShape: 'rounded'  
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: ['#0080ff', '#d4d8de'],
        series: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
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
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-bar-chart"),
        options
    );
    chart.render();
    /* Apex Pie Chart */
    var options = {
        chart: {
            type: 'donut',
            width: 180,
            height: 150
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
        colors: ['#0080ff', '#d4d8de'],
        series: [60, 40],
        legend: {
            show: false,
        },
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-pie-chart"),
        options
    );    
    chart.render();
    /* Apex Radial Chart */
    var options = {
        chart: {
            height: 250,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '18px',
                        fontFamily: 'Muli',
                    },
                    value: {
                        fontSize: '16px',
                        fontFamily: 'Muli',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function (w) {
                            return 249
                        }
                    }
                }
            }
        },
        colors: ['#0080ff', '#18d26b','#ffa800', '#d4d8de'],
        series: [44, 55, 67, 83],
        labels: ['News', 'Media', 'Ads', 'Others'],   
    }
   var chart = new ApexCharts(
        document.querySelector("#apex-radial-chart"),
        options
    );    
    chart.render();
    /* User Slider */
    $('.user-slider').slick({
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