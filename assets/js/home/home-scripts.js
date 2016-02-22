jQuery(document).ready(function($){

	$('#countdown').countdown(THE_GREAT_DELUGE.launch, function(event){

		var days 	= event.offset.totalDays;
			hours 	= event.offset.hours;
			minutes = event.offset.minutes;
			seconds = event.offset.seconds;


		$(this).html('<div class="days"></div><div class="hours"></div><div class="minutes"></div><div class="seconds"></div>');

		$('.days').html('<span class="counter">' + days + '</span>');

		$('.hours').html('<span class="counter">' + hours + '</span>');

		$('.minutes').html('<span class="counter">' + minutes + '</span>');

		$('.seconds').html('<span class="counter">' + seconds + '</span>');

	});

});