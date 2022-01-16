/*
---------------------------------
    : Custom - Switchery js :
---------------------------------
*/
!function($) {
  "use strict";
      /* -- Switchery - Colored Switches -- */
      var primary = document.querySelector('.js-switch-primary');
      var switchery = new Switchery(primary, { color: '#0080ff' });
      var secondary = document.querySelector('.js-switch-secondary');
      var switchery = new Switchery(secondary, { color: '#93b4d4' });
      var success = document.querySelector('.js-switch-success');
      var switchery = new Switchery(success, { color: '#18d26b' });
      var danger = document.querySelector('.js-switch-danger');
      var switchery = new Switchery(danger, { color: '#ff3f3f' });
      var warning = document.querySelector('.js-switch-warning');
      var switchery = new Switchery(warning, { color: '#ffa800' });      
      var info = document.querySelector('.js-switch-info');
      var switchery = new Switchery(info, { color: '#00b8d4' });
      var light = document.querySelector('.js-switch-light');
      var switchery = new Switchery(light, { color: '#d4d8de' });
      var dark = document.querySelector('.js-switch-dark');
      var switchery = new Switchery(dark, { color: '#263a5b' });
      /* -- Switchery - Small Switches -- */
      var primary_small = document.querySelector('.js-switch-primary-small');
      var switchery = new Switchery(primary_small, { color: '#0080ff', size: 'small' });
      var secondary_small = document.querySelector('.js-switch-secondary-small');
      var switchery = new Switchery(secondary_small, { color: '#93b4d4', size: 'small' });
      var success_small = document.querySelector('.js-switch-success-small');
      var switchery = new Switchery(success_small, { color: '#18d26b', size: 'small' });
      var danger_small = document.querySelector('.js-switch-danger-small');
      var switchery = new Switchery(danger_small, { color: '#ff3f3f', size: 'small' });
      var warning_small = document.querySelector('.js-switch-warning-small');
      var switchery = new Switchery(warning_small, { color: '#ffa800', size: 'small' });      
      var info_small = document.querySelector('.js-switch-info-small');
      var switchery = new Switchery(info_small, { color: '#00b8d4', size: 'small' });
      var light_small = document.querySelector('.js-switch-light-small');
      var switchery = new Switchery(light_small, { color: '#d4d8de', size: 'small' });
      var dark_small = document.querySelector('.js-switch-dark-small');
      var switchery = new Switchery(dark_small, { color: '#263a5b', size: 'small' });
      /* -- Switchery - Large Switches -- */
      var primary_large = document.querySelector('.js-switch-primary-large');
      var switchery = new Switchery(primary_large, { color: '#0080ff', size: 'large' });
      var secondary_large = document.querySelector('.js-switch-secondary-large');
      var switchery = new Switchery(secondary_large, { color: '#93b4d4', size: 'large' });
      var success_large = document.querySelector('.js-switch-success-large');
      var switchery = new Switchery(success_large, { color: '#18d26b', size: 'large' });
      var danger_large = document.querySelector('.js-switch-danger-large');
      var switchery = new Switchery(danger_large, { color: '#ff3f3f', size: 'large' });
      var warning_large = document.querySelector('.js-switch-warning-large');
      var switchery = new Switchery(warning_large, { color: '#ffa800', size: 'large' });      
      var info_large = document.querySelector('.js-switch-info-large');
      var switchery = new Switchery(info_large, { color: '#00b8d4', size: 'large' });
      var light_large = document.querySelector('.js-switch-light-large');
      var switchery = new Switchery(light_large, { color: '#d4d8de', size: 'large' });
      var dark_large = document.querySelector('.js-switch-dark-large');
      var switchery = new Switchery(dark_large, { color: '#263a5b', size: 'large' });
      /* -- Switchery - Multicolor Switches -- */
      var primary_multicolor = document.querySelector('.js-switch-primary-multicolor');
      var switchery = new Switchery(primary_multicolor, { color: '#0080ff', jackColor: '#dbe5fd' });
      var secondary_multicolor = document.querySelector('.js-switch-secondary-multicolor');
      var switchery = new Switchery(secondary_multicolor, { color: '#93b4d4', jackColor: '#e9eaed' });
      var success_multicolor = document.querySelector('.js-switch-success-multicolor');
      var switchery = new Switchery(success_multicolor, { color: '#18d26b', jackColor: '#a5ecc4' });
      var danger_multicolor = document.querySelector('.js-switch-danger-multicolor');
      var switchery = new Switchery(danger_multicolor, { color: '#ff3f3f', jackColor: '#ffe4e6' });
      var warning_multicolor = document.querySelector('.js-switch-warning-multicolor');
      var switchery = new Switchery(warning_multicolor, { color: '#ffa800', jackColor: '#fef7e6' });      
      var info_multicolor = document.querySelector('.js-switch-info-multicolor');
      var switchery = new Switchery(info_multicolor, { color: '#00b8d4', jackColor: '#c7ecee' });
      var light_multicolor = document.querySelector('.js-switch-light-multicolor');
      var switchery = new Switchery(light_multicolor, { color: '#d4d8de', jackColor: '#e2e6ea' });
      var dark_multicolor = document.querySelector('.js-switch-dark-multicolor');
      var switchery = new Switchery(dark_multicolor, { color: '#263a5b', jackColor: '#7e7e7e' });
      /* -- Switchery - On-Off Multicolor Switches -- */
      var primary_multicolor_on_off = document.querySelector('.js-switch-primary-multicolor-on-off');
      var switchery = new Switchery(primary_multicolor_on_off, { color: '#0080ff', secondaryColor: '#949ca9', jackColor: '#dbe5fd', jackSecondaryColor: '#e9eaed' });
      var secondary_multicolor_on_off = document.querySelector('.js-switch-secondary-multicolor-on-off');
      var switchery = new Switchery(secondary_multicolor_on_off, { color: '#93b4d4', secondaryColor: '#0080ff', jackColor: '#e9eaed', jackSecondaryColor: '#dbe5fd' });
      var success_multicolor_on_off = document.querySelector('.js-switch-success-multicolor-on-off');
      var switchery = new Switchery(success_multicolor_on_off, { color: '#18d26b', secondaryColor: '#ff3f3f', jackColor: '#a5ecc4', jackSecondaryColor: '#ffe4e6' });
      var danger_multicolor_on_off = document.querySelector('.js-switch-danger-multicolor-on-off');
      var switchery = new Switchery(danger_multicolor_on_off, { color: '#ff3f3f', secondaryColor: '#18d26b', jackColor: '#ffe4e6', jackSecondaryColor: '#a5ecc4' });
      var warning_multicolor_on_off = document.querySelector('.js-switch-warning-multicolor-on-off');
      var switchery = new Switchery(warning_multicolor_on_off, { color: '#ffa800', secondaryColor: '#00b8d4', jackColor: '#fef7e6', jackSecondaryColor: '#c7ecee' });
      var info_multicolor_on_off = document.querySelector('.js-switch-info-multicolor-on-off');
      var switchery = new Switchery(info_multicolor_on_off, { color: '#00b8d4', secondaryColor: '#ffa800', jackColor: '#c7ecee', jackSecondaryColor: '#fef7e6' });
      var light_multicolor_on_off = document.querySelector('.js-switch-light-multicolor-on-off');
      var switchery = new Switchery(light_multicolor_on_off, { color: '#d4d8de', secondaryColor: '#263a5b', jackColor: '#e2e6ea', jackSecondaryColor: '#7e7e7e' });
      var dark_multicolor_on_off = document.querySelector('.js-switch-dark-multicolor-on-off');
      var switchery = new Switchery(dark_multicolor_on_off, { color: '#263a5b', secondaryColor: '#d4d8de', jackColor: '#7e7e7e', jackSecondaryColor: '#e2e6ea' });
}(window.jQuery);