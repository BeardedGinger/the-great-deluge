jQuery(document).ready(function($){

	$('#countdown').countdown(THE_GREAT_DELUGE.launch, function(event){
		$(this).text(
			event.strftime('%D %H:%M:%S')
		);
	});
});