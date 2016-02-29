jQuery(document).ready(function($){

	var currentDate = Math.floor(Date.now()/1000);
		launch = THE_GREAT_DELUGE_HOME.launch;
		timer = launch - currentDate;

	$('#countdown').attr('data-timer', timer);

	if(timer > 0) {
		$('#countdown').TimeCircles({
			animation: 'ticks',
			bg_width: 1.2,
			fg_width: 0.05,
			time: {
				Days: { show: true },
				Hours: { show: true }
			}
		});
	}
});