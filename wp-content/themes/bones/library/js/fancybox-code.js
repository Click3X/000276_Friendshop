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
      $('.iframe-container-small').find('iframe').attr('src', '');
	  }

	}); 

    $.fancybox.open([{
        helpers: {

            overlay: {
                locked: true,
                
            }
        }
        
    }]);

  // init GALLERY fancybox
  // $(".gallery-fancy").fancybox({
  //   tpl: {
  //     next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span class="gallery-next">></span></a>',
  //     prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span class="gallery-prev"><</span></a>'
  //   }

      
  // });

}); 