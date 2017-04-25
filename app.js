/*$("#botmodal").on("click",function(){


	$("#modal-date").modal();
});*/ 

var date = new Date();
date.setDate(date.getDate());

	$('.dp').datepicker({
	    startDate: date,
	        todayHighlight: true

});