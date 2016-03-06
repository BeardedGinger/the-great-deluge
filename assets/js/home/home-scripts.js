jQuery(document).ready(function($){

	var currentDate = Math.floor(Date.now()/1000);
		launch = THE_GREAT_DELUGE_HOME.launch;
		dayColor = THE_GREAT_DELUGE_HOME.day_color;
		hourColor = THE_GREAT_DELUGE_HOME.hour_color;
		minuteColor = THE_GREAT_DELUGE_HOME.minute_color;
		secondColor = THE_GREAT_DELUGE_HOME.second_color;
		timer = launch - currentDate;

	$('#countdown').attr('data-timer', timer);

	if(timer > 0) {
		$('#countdown').TimeCircles({
			animation: 'ticks',
			bg_width: 1.2,
			fg_width: 0.05,
			time: {
				Days: {
					color: dayColor,
					show: true
				},
				Hours: {
					color: hourColor,
					show: true
				},
				Minutes: {
					color: minuteColor,
					show: true
				},
				Seconds: {
					color: secondColor,
					show: true
				},

			}
		});
	}
});