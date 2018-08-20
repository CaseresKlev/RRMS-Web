$("#status").change(function(){
	//$(".btn-radio").prop('checked', false);
	//alert($("#status").val());
	if($("#status").val()==="Disseminated / Presented"){
		$(".fieldset-published").hide();
		$(".fieldset-disseminated").slideDown("slow");
		//$(".fieldset-disseminated").css("background-color","red");
	}else if($("#status").val()==="Published"){
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
	//alert(book_id);
	var title = $("#title").val();
	var status = $("#status").val();
	//alert(status);
	var cited = $("#cite").val();
	//alert(cited);
	
	if(status=="Disseminated / Presented"){
		var distype = $("#dis-type").val();
		var discon = $("#dis-con").val();
		var conven = $("#con-ven").val();
		var disdate = $("#disdate").val();
		//var discert = $("#dis-cert").val();
		//alert(disdate);

		if(distype=="" || discon=="" || conven=="" || disdate==""){
			 alert("Please provide dissimination information.");
			
		}else{
			$("#dis-form").ajaxSubmit(
			 {
			 	url: 'uploadDisseminated.php',
			 	type: 'POST',
			 	success: function(data){
			 		alert(data);
			 		window.location.replace("admindashboard.php");
			 	}


			 });


			$.ajax({

				url: 'savechanges.php',
				type: 'POST',
				cache: false,
				data:{
					book_id: book_id,
					status: status,
					cited: cited,
					date: disdate
				}, 
				success: function(data){
					alert(data);
				}

			})
		}


		
		

	}else if(status=="Published"){
		var issn = $("#isdn").val();
		var journal = $("#journal").val();
		var type = $("#type").val();
		var date = $("#pubdate").val();
		var id = $("#book_id").val();



		if(issn=="" || journal=="" || type=="" || date==""){
			alert("Please provide Published information");
		}else{
			$.ajax({

				url: 'uploadPublished.php',
				type: 'POST',
				cache: false,
				data:{
					issn: issn,
					journal: journal,
					type: type,
					date: date,
					book_id: id
				}, 
				success: function(data){
					alert(data);
					window.location.replace("admindashboard.php");
				}

			});

			$.ajax({

				url: 'savechanges.php',
				type: 'POST',
				cache: false,
				data:{
					book_id: book_id,
					status: status,
					cited: cited,
					date: date
				}, 
				success: function(data){
					alert(data);
				}

			})
		}
		
	}else if(status==""){
		alert("Please choose book status.");
	}else{

	}
	//alert(title);
})