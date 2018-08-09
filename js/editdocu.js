$("#status").click(function(){
	//$(".btn-radio").prop('checked', false);
	if($("#status").val()=="Disseminated"){
		$(".fieldset-published").hide();
		$(".fieldset-disseminated").slideDown("slow");
	}else if($("#status").val()=="Published"){
		$(".fieldset-disseminated").hide();
		$(".fieldset-published").slideDown("slow");
	}else{
		$(".fieldset-published").hide();
		$(".fieldset-disseminated").hide();
	}
})

$("#instructor-btn-save").click(function(){
	//alert("hbbg");

	var book_id = $("#book_id").val();
	var title = $("#title").val();
	var status = $("#status").val();
	var cited = $("#cite").val();

	//disseminated
	var disseminatedLoc = "";
	var disseminatedDesc = "";


	//published
	var isdn = "";
	var journal ="";
	
	if(status=="Disseminated"){
		if(!$(".btn-radio").is(':checked')){
			alert("Please provide Disseminated status");
		}else{
			/*if($("#btn-radio-intl").prop('checked', false)){
				var
			}*/
			disseminatedLoc = $("input[class='btn-radio']:checked"). val();
			disseminatedDesc = $("#disseminated-desc"). val();
			//var query="INSERT INTO `disseminated` (`id`, `book_id`, `location`, `description`) VALUES ('', '1', 'loc', 'desc')";
			$.ajax({
				url:'savechanges.php',
				type:'POST',
				cache: false,
				data:{
					book_id: book_id,
					status: status,
					cited:cited,
					disLoc: disseminatedLoc,
					disDesc:disseminatedDesc,
				},
				success: function(data){
					alert(data);
				}


			})

			//alert(disseminatedLoc);
		}

	}else if(status=="Published"){
		if($("#journal").val()=="" && $("#isdn").val()==""){
			alert("Please provide ISDN and Journal name.");
		}else{
			isdn = $("#isdn").val();
			journal = $("#journal").val();

		$.ajax({
				url:'savechanges.php',
				type:'POST',
				cache: false,
				data:{
					book_id: book_id,
					status: status,
					cited:cited,
					isdn: isdn,
					journal: journal,
				},
				success: function(data){
					alert(data);
					//window.location="admindashboard.php";
				}


			})

		//alert(journal);
		//alert(isdn);
		}
		
	}else if(status==""){
		alert("Please choose book status.");
	}else{
		$.ajax({
				url:'savechanges.php',
				type:'POST',
				cache: false,
				data:{
					book_id: book_id,
					status: status,
					cited:cited,
				},
				success: function(data){
					alert(data);
					window.location="admindashboard.php";
				}


			})
	}
	//alert(title);
})