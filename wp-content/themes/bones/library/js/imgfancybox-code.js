jQuery(document).ready(function($) {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$( "[rel='f-gallery']" ).fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			nextEffect  : 'none',
			prevEffect  : 'none'
		});
    } else {
    	$( "[rel='f-gallery']" ).fancybox({
			openEffect  : 'elastic',
			closeEffect : 'elastic',
			nextEffect  : 'elastic',
			prevEffect  : 'elastic'
		});
    }
	
});