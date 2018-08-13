

$("#searchbtn").click(function(){
	if ($(".header_search-container").css("display") == 'none'){
		//alert("true");
		$(".header_search-container").slideDown("slow");
		//
		
	}
	else{
		$(".header_search-container").slideUp("slow");
	}
	
});


$("#btn-search-home").click(function(){
	var skey = $("#skey").val();
	var filterdate = $("#filterdate").val(); 
	var by = "";

	if(filterdate==""){
		if($('#search_title').is(':checked')){
		//alert("searct");
		by = "title";
		
		
	}else if($('#search_kw').is(':checked')){
		by = "kw";
	}

	
	}

	var search = "" + skey + "-" + by + "-" + filterdate;

	window.location.replace("searchcontent.php?search="+search)
	
});