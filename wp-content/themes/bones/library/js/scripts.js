/*
 * Bones Scripts File
/*

 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

// FIX STICKY HOVER EFFECT ON TOUCHSCREEN
function fix()
{
    var el = this;
    var par = el.parentNode;
    var next = el.nextSibling;
    par.removeChild(el);
    setTimeout(function() {par.insertBefore(el, next);}, 0)
}


/*
 * Put all your regular jQuery in here.
*/

jQuery(document).ready(function($) {

// DISABLE HOVER EFFECT ON SCROLLING
  var body = document.body,
  timer;

  window.addEventListener('scroll', function() {
    clearTimeout(timer);
    if(!body.classList.contains('disable-hover')) {
      body.classList.add('disable-hover')
    }
    
    timer = setTimeout(function(){
      body.classList.remove('disable-hover')
    },200);
  }, false);

// $(window).scroll(function() {
//   var distance = $(window).scrollTop() -$(document).height() + $(window).height();
//   console.log(distance);
// });

// $(window).scroll(function() {
//         // GET WINDOW SCROLL TOP
//         scroll = $(window).scrollTop();
//         console.log('This is scroll:');
//         console.log(scroll);

//     });


  // AJAX BINDING
  // $.ajaxSetup({cache:false});
  //       $(".players_link").click(function(){
  //           var post_link = $(this).attr("href");
  // console.dir(post_link);
  //           $("#select-refresh-wrapper").html("content loading");
  //           $("#select-refresh-wrapper").load(post_link);
  //       return false;
  // });



  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
     $('.mqplay-btn').remove();
     $('#video-slider-prev,#video-slider-next').css('display','none');
     $('figcaption').css('visibility','hidden');
     $('.grid').find('figure').removeClass('effect-selena');
     $('.grid').find('div').removeClass('hover-shadow');

  }

  $('.video-thumb').click(function() {
      // ADDING PRELOADER
      $(this).next().find('.myLoader').show();
      video = '<iframe src="'+ $(this).attr('data-video') +'"></iframe>';
      $(this).next().find('iframe').replaceWith(video);
      $(this).next().find('iframe').on('load', function () {
          $(this).prev().hide();
      });
  });





// CREDIT BAR DRAWER
$('.credit-bar').click(function(){
  // IF MOBILE
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    // IF IFRAME EXISTS
    if ($('#video-bxslider').find('iframe').length) {
      //$('.credit-arrow').css('opacity', '0');
      //$('.credit-bar:hover').css('color', 'white');
    } else {
      ToggleDrawer();
    }
  } else {
    ToggleDrawer();
  }



});

function ToggleDrawer() {
  $('.credit-bar').css('visibility', 'hidden');
  $('.credit-content').toggleClass('hide').toggleClass('show');
  // $('.credit-arrow').toggleClass('arrow-d').toggleClass('arrow-u');
  return false;
}

$('.cb-inner').click(function(){
  $('.credit-bar').css('visibility', 'visible');
    $('.credit-content').toggleClass('hide').toggleClass('show');
    // $('.credit-arrow').toggleClass('arrow-d').toggleClass('arrow-u');
    return false;
});




// HIGHLIGHT SELECTED DIRECTOR
$('.new-players').click(function(e){
  e.preventDefault();

  // REDUCE MARGIN TOP
  $('.editors-wrapper').css('margin-top', '10px');
  $('.editors-parent').css('margin-top', '0');



  // Display Reels tab
  if ($('.etabs').css('visibility') == 'hidden') {
    $('.etabs').css('visibility','visible');
    $('.e-bottom').addClass('dis-ani');
}
  $('.new-players').find('.e-bottom').removeClass("editor-active");
  $('.new-players').find('.e-top').addClass("editor-active");
  // $(this).find('.e-top').addClass("editor-inactive");
  $(this).find('.e-bottom').addClass('editor-active');
  $(this).find('.e-top').addClass('editor-inactive');

  var director = this.id.slice(4);
  var director_container = director + '-container';
  $('.editors-videos').removeClass("container-active");
  //$('.editors-videos').fadeOut();
  $("#" + director_container).addClass('container-active');
  //$("#" + director_container).fadeIn();
  // $('.editors-videos').fadeOut();
  // $("#" + director_container).fadeIn();

  // SCROLL TO THE CONTAINER
  $('body,html').animate({
    scrollTop: 
    $("#work-ul").offset().top
  }, 300);
  // var el = document.getElementById('#tab-container');
  //     el.scrollIntoView(true);
  //$.scrollTo('#tab-container');
});


// $("iframe").each(function(){
//       var ifr_source = $(this).attr('src');
//       var wmode = "&wmode=transparent";
//       $(this).attr('src',ifr_source+wmode);
// });


  //Blinking text
  // var el = $('.players-title');
  // setInterval(function() {
  //    el.toggleClass('blinking');
  // }, 80);



  // init carousel OF ORIGINAL SELECTING PLAYERS
  // $(function() {
  // if($(window).width() < 700){
          
  //         $('.carousel-no-style').jCarouselLite({
  //             visible: 1,
  //             btnNext: ".next",
  //             btnPrev: ".prev"
  //         });
  //     }
  // else {
          
  //         $('.carousel-no-style').jCarouselLite({
  //             visible: 2,
  //             btnNext: ".next",
  //             btnPrev: ".prev"
  //         });
  // }
  // });

  // When window resize
  // $(window).trigger('resize');

  // $(window).resize(function(){
  //     if($(window).width() < 700){
  //         $('.next, .prev').unbind('click');
  //         $('.carousel-no-style').jCarouselLite({
  //             visible: 1,
  //             btnNext: ".next",
  //             btnPrev: ".prev"
  //         });
  //     }
  //     else {
  //         $('.next, .prev').unbind('click');
  //         $('.carousel-no-style').jCarouselLite({
  //             visible: 2,
  //             btnNext: ".next",
  //             btnPrev: ".prev"
  //         });
  //     }
  // });



  // MOBILE MENU
  var button = document.querySelector('.menu-icon');
  button.addEventListener('click', function (event) {
    button.classList.toggle('open');
    $('nav').toggleClass('menu-display');
    event.stopPropagation();
    event.preventDefault();
  });


  // init tabs
  $('#tab-container').easytabs();

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();


  // highlight selected menu item
  var url = window.location;
  $('a[href="'+url+'"]').parent('#menu-main-menu>li').addClass('main-menu-selected');



  // AJAX FUNCTION TO CORRESPOND WITH SERVER FUNCTION FROM FUNCTIONS.PHP
//   function cat_ajax_get(catID) {
//     jQuery("a.ajax").removeClass("current");
//     jQuery("a.ajax").addClass("current"); //adds class current to the category menu item being displayed so you can style it with css
//     jQuery("#loading-animation-2").show();
//     var ajaxurl = '/wp-admin/admin-ajax.php';
//     jQuery.ajax({
//         type: 'POST',
//         url: ajaxurl,
//         data: {"action": "load-filter", cat: catID },
//         success: function(response) {
//             jQuery("#category-post-content").html(response);
//             jQuery("#loading-animation").hide();
//             return false;
//         }
//     });
// }





// ***********************************
// BELOW ARE THE WORKING EXAMPLE AJAX


    // var _director = "";
    // var _category = "6";

    // function getVideos(){
    //   $('#videoList').empty();
    //   var data = {
    //     director:_director,
    //     category:_category,
    //     action:'getEditorsVideos'
    //   };
      
    //   console.log('make the ajax call with:');
    //   console.log(data);

      
    //   $.ajax({
    //     type:'POST',
    //     ajaxurl:'/wp-admin/admin-ajax.php',
    //     dataType:'json',
    //     data:data,
    //     success:function(data){
    //       console.log('success');
    //     },
    //     error: function(err){
    //       console.log(err);
    //     }
    //   });
      
    // }

    // $('.director_btn').on('click', function(e){
    //   e.preventDefault();
    //   _director = $(this).attr('data-director');
    //   getVideos();
    // });


    // $('.cat_btn').on('click', function(e){
    //   e.preventDefault();
    //   _category = $(this).attr('data-category');
    //   getVideos();
    // });
    
    // getVideos();


}); /* end of as page load scripts */
