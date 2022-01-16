/*
-------------------------------------------
    : Custom - Dashboard Hospital js :
-------------------------------------------
*/
"use strict";
$(document).ready(function() {    
    /* -- Apex Basic Column Chart -- */
    var options = {
        chart: {
            height: 295,
            type: 'bar',
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
                columnWidth: '45%',
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
        colors: ['#0080ff','#18d26b','#d4d8de'],
        series: [{
            name: 'New',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
            name: 'Old',            
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: 'Booked',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        yaxis: {
            title: {
                text: ''
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        fill: {
            opacity: 1

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
        document.querySelector("#apex-basic-column-chart"),
        options
    );
    chart.render();

    /* ----- Apex Hospital Expense Chart ----- */
    var options = {
        chart: {
            type:"area",
            height: 80,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth", 
            width: 2
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [20, 100, 100, 100]
            },
        },
        series:[ {
            data: [71, 40, 28, 51, 42, 109, 100]
        }],
        yaxis: {
            min: 0
        },
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
        document.querySelector("#apex-hospital-expense-chart"),
        options
    );
    chart.render();

    /* ----- Apex Pharmacy Expense Chart ----- */
    var options = {
        chart: {
            type:"area",
            height: 80,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth", 
            width: 2
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [20, 100, 100, 100]
            },
        },
        series:[ {
            data: [35, 105, 95, 45, 25, 95, 58]
        }],
        yaxis: {
            min: 0
        },
        colors:["#d4d8de"],
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
        document.querySelector("#apex-pharmacy-expense-chart"),
        options
    );
    chart.render();
    
    /* ----- Apex Operation Status Chart ----- */
    var options = {
        chart: {
            height: 280,
            type: 'radialBar',
            offsetY: -10
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '18px',
                        fontFamily: 'Muli',
                        color: '#8A98AC',
                        offsetY: 120
                    },
                    value: {
                        offsetY: 76,
                        fontSize: '24px',
                        fontFamily: 'Muli',
                        color: '#263a5b',
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.15,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4
        },
        colors:["#0080ff"],
        series: [65],
        labels: ['Completed'],        
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-operation-status-chart"),
        options
    );        
    chart.render();

    /* -- Blog Slider -- */
    $('.blog-slider').slick({
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