$(function () {
	var handleDatepicker = function() {
    $('#datepicker-default').datepicker({
        todayHighlight: true
    });
    $('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    $('.input-daterange').datepicker({
        todayHighlight: true
    });
    $('#datepicker-disabled-past').datepicker({
        todayHighlight: true
    });
    $('#datepicker-autoClose').datepicker({
        todayHighlight: true,
        autoclose: true
    });
};
     $('#datetimepicker1').datetimepicker();
     $('.datetimepicker12').datetimepicker({
        format: 'L'
    });
     $('.datetimepicker12').datetimepicker();
				    $('#datetimepicker2').datetimepicker({
				        format: 'LT'
				    });
                    
				    $('#datetimepicker3').datetimepicker();
				    $('#datetimepicker4').datetimepicker();
				    $("#datetimepicker3").on("dp.change", function (e) {
				        $('#datetimepicker4').data("DateTimePicker").minDate(e.date);
				    });
				    $("#datetimepicker4").on("dp.change", function (e) {
				        $('#datetimepicker3').data("DateTimePicker").maxDate(e.date);
                    });
                    $('#datetimepicker6').datetimepicker({
                        format: 'L'
                    });
                    $('#datetimepicker7').datetimepicker({
                        format: 'L'
                    });
                    $("#datetimepicker6").on("dp.change", function (e) {
                        
                        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                        
				    });
				    $("#datetimepicker7").on("dp.change", function (e) {
                       
                        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                        
                    });
                   
				
	// body...
});