
/* German initialisation for the jQuery UI date picker plugin. */
/* Written by Milian Wolff (mail@milianw.de). */
jQuery(function($){
	$.datepicker.regional['de'] = {
		closeText: 'schließen',
		prevText: '&#x3c;zurück',
		nextText: 'Vor&#x3e;',
		currentText: 'heute',
		monthNames: ['January','February','March','April','May','June',
		'July','August','September','Octomber','November','December'],
		monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun',
		'Jul','Aug','Sep','Oct','Nov','Dec'],
		dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
		dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
		dayNamesMin: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
		dateFormat: 'yy-mm-dd', firstDay: 0,
		isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['de']);
});
