

$(".header_btn").click(function(){
	if ($(".header_search-container").css("display") == 'none'){
		//alert("true");
		$(".header_search-container").slideDown("slow");
		//
		
	}
	else{
		$(".header_search-container").slideUp("slow");
	}
	
});