
function getSchool(val) { 
	$.ajax({
		type: "POST",
		url: "./ajax/get-state-ep.php",
		data:'provID='+val,
		beforeSend: function() {
			$("#school-list").addClass("loader");
		},
		success: function(data){
			$("#school-list").html(data);
			$("#school-list").removeClass("loader");
		}
	});
}