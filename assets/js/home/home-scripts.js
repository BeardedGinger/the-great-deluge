jQuery(document).ready(function($){

	var currentDate = Math.floor(Date.now()/1000);
		launch = THE_GREAT_DELUGE.launch;
		timer = launch - currentDate;

	$('#countdown').attr('data-timer', timer);

	$('#countdown').TimeCircles({
		animation: 'ticks',
		bg_width: 0.1,
		fg_width: 0.02,
		time: {
			Days: { show: true },
			Hours: { show: true }
		}
	});

});