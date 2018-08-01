

$(".btn").click(function(){
	if ($(".search-container").css("display") == 'none'){
		//alert("true");
		$(".search-container").slideDown("slow");
		//
		
	}
	else{
		$(".search-container").slideUp("slow");
	}
	
});