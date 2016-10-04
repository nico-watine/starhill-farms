jQuery(document).ready(function () {
	// = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = 
    // date picker settings
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = 
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(),
        nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $('#datepick1').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ?
                'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('#datepick2')[0].focus();
    }).data('datepicker');
    var checkout = $('#datepick2').datepicker({
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ?
                'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        checkout.hide();
    }).data('datepicker');
	
	// ======================================================================
	
	jQuery('#datepick1').datepicker({
		weekStart: 1 // day of the week start. 0 for Sunday - 6 for Saturday
	});

	jQuery('#datepick2').datepicker({
		weekStart: 1 // day of the week start. 0 for Sunday - 6 for Saturday
	});
	
	$('#datepick1').on('changeDate', function(ev){
    $(this).datepicker('hide');
	});
	
	$('#datepick2').on('changeDate', function(ev){
    $(this).datepicker('hide');
	});
});
				