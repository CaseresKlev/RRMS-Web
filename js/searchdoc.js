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