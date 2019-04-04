$(document).ready(function() {
			$(".collapse").on('show.bs.collapse', function() {
				$(".collapse").collapse('hide');
			});
		});


		$(document).click(function(e) {
	if (!$(e.target).is('.navbar-collapse')) {
    	$('.collapse').collapse('hide');	    
    }
});