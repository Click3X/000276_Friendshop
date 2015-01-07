jQuery(document).ready(function($) {
  // init video slider
  var marqueeSlider = $('#video-bxslider').bxSlider({
    auto: true,
    pause: 7000,
    //autoHover: true,
    video: true,
    useCSS: false,
    nextSelector: '#video-slider-next',
    prevSelector: '#video-slider-prev',
    nextText: '>',
    prevText: '<',
    onSlideAfter: function() {
        timer = setTimeout(marqueeSlider.startAuto(), 7000);
        pauseAll();
    }
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

  $('.video-poster').click(function(){
      console.log('poster');    
    
      $(this).prev().show();
      $(this).css('display', 'none');
      $(this).next('.mqplay-btn').css('display', 'none');
      video = '<iframe id="'+ $(this).attr('data-name') +'" src="'+ $(this).attr('data-video') +'?api=1&player_id='+ $(this).attr('data-name') +'"></iframe>';
      $(this).before(video);
      marqueeSlider.stopAuto();
      $('iframe').on('load', function () {
        console.log('I loaded');
        marqueeSlider.stopAuto();
        $(this).prev().hide();
      });
      
      return false;
  });

  $('.mqplay-btn').click(function(){
    
      console.log('playbutton fuck');
    
      $(this).prev().prev().show();
      $(this).prev().css('opacity', '0');
      video = '<iframe src="'+ $(this).attr('data-video') +'?api=1&player_id='+ $(this).attr('data-name') +'"></iframe>';
      $(this).prev().before(video);
      $(this).css('display', 'none');
      $('iframe').on('load', function () {
        console.log('I loading not finished');
        $(this).prev().hide();
        marqueeSlider.stopAuto();
      });
  });


// THIS IS WORKING
  $('.bx-pager-item a').click(function(e){
    console.log('dots');
    pauseAll();
            var i = $(this).attr("data-slide-index");
            marqueeSlider.goToSlide(i);
            marqueeSlider.stopAuto();
            restart=setTimeout(function(){
                marqueeSlider.startAuto();
            },500);

            return false;
  });

// THIS IS WORKING
$('#video-slider-next a, #video-slider-prev a').click(function() {
    console.log('next/prev');
    console.log('iframe exists');
    pauseAll();
  // var iframe = document.querySelector("iframe");
  // var player = Froogaloop(iframe);

  // player.addEvent('ready', function () {
  //   console.log('ready is fired');
  //   player.addEvent('playProgress', pauseAll);
  // });


    // player.api('unload');



    
    marqueeSlider.stopAuto();
    marqueeSlider.startAuto();
    return false;
  });


function pauseAll() {
  if ($('#video-bxslider').find('iframe').length) {
    console.log('one iframe just paused');
    $('#video-bxslider').find('iframe').remove();
    $('.video-poster').css('display', 'block');
    $('.mqplay-btn').css('display', 'block');
    }
}

 $('.video-poster').on('click', function(){
  marqueeSlider.stopAuto();
 });

  $('.video-thumb').click(function(){
    console.log('video thumb clicked');
    pauseAll();
    marqueeSlider.stopAuto();
    marqueeSlider.startAuto();
  });

  // $('.closeFancy').click(function(){
  //   console.log('close btn clicked');
  //   marqueeSlider.startAuto();
  // });


});




