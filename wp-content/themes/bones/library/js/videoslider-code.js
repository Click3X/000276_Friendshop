  // FREE MASON
  jQuery(document).ready(function($) {
  // init video slider
  $('#video-bxslider').bxSlider({
    video: true,
    useCSS: false,
    nextSelector: '#video-slider-next',
    prevSelector: '#video-slider-prev',
    nextText: '>',
    prevText: '<'
  });

$('#news-bxslider').bxSlider({
    // video: true,
    // useCSS: false
    auto: true,
    pause: 4000,
    autoHover: true,
    nextSelector: '#news-slider-next',
    prevSelector: '#news-slider-prev',
    nextText: '>',
    prevText: '<'
    // autoControls: true
  });
  });