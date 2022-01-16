/*
---------------------------------
    : Custom - Widgets js :
---------------------------------
*/
"use strict";
$(document).ready(function() {   
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