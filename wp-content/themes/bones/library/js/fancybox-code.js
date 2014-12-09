jQuery(document).ready(function($) {
  // init fancybox
  // Remove padding, set opening and closing animations, close if clicked and disable overlay
  // $(".video-fancy").fancybox({
  //       padding: 0,

  //       openEffect : 'elastic',
  //       openSpeed  : 150,

  //       closeEffect : 'elastic',
  //       closeSpeed  : 150,

  //       closeClick : true,

  //       helpers : {
  //         overlay : null
  //       }
  // });

  // init WORK/EDITORS fancybox
  $(".video-hook").fancybox({
  	
	  afterClose: function() {
	    $('.iframe-container').find('iframe').attr('src', '');
	  }

	}); 

  // init GALLERY fancybox
  $(".gallery-fancy").fancybox();

}); 