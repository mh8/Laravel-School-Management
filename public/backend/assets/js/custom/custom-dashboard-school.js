/*
----------------------------------------------
    : Custom - Dashboard CRM js :
----------------------------------------------
*/
"use strict";
$(document).ready(function() {    
    /* -----  Apex Area Chart ----- */
    var options = {
        chart: {
            height: 238,
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
            curve: 'straight',
        },
        colors: ['#0080ff'],
        series: [{
            name: 'Percentage',
            data: [31, 40, 28, 51, 62, 48, 72, 58, 89, 80]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            type: 'datetime',
            categories: ["2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020"],
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
        document.querySelector("#apex-area-chart"),
        options
    );
    chart.render();
    
    /* -- Course Slider -- */
    $('.course-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="feather icon-arrow-left"></i>',
        nextArrow: '<i class="feather icon-arrow-right"></i>'
    });

    /* -- Parents Slider -- */
    $('.parents-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="feather icon-arrow-left"></i>',
        nextArrow: '<i class="feather icon-arrow-right"></i>'
    });
});