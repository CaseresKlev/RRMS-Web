$("#btn-search").click(function(){

	var searchkey = $("#search-key").val();
	//alert(searchkey);

	/*$.ajax({
		type: "GET",
		cache: false,
		data:{
			searchkey:searchkey
		},
		success:function(data){
			//alert(data);
			//$("#debug").html(data);
		}
	});*/
	window.location.replace("admindashboard.php?search="+searchkey);

})

$("#submit1").click(function(){

//alert("sadasdasf");
if ( $("#department").val()==""|| $("#college").val()=="") {
	alert("Please Fill all Fields!");
}else {
	var dept = $("#department").val().toUpperCase();
	var college = $("#college").val().toUpperCase();

	$.ajax({
		url:"valdept.php",
		type:"POST",
		cache:false,
		data:{
			dept:dept,
			college:college,
			task:"add"
		},
		success:function(data){
			alert(data);
		}

	});
}




})

$("#btn-del").click(function(){

	var dept= $("#deldept").val();
	//alert(dept);

	$.ajax({
		url:"valdept.php",
		type:"POST",
		cache:false,
		data:{
			dept:dept,
			task:"del"
		},
		success: function(data){
			alert(data);
			location.reload(true);
		}

	});



})
