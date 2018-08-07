$(".btn-update").click(function(){
	//alert("h");

	var opsw = $("#oldpsw").val();
	var npsw = $("#npsw").val();
	alert(npsw);

	var ncpsw = $("#ncpsw").val();
	alert(ncpsw);
	var gname = $("#gname").val();
	if(opsw==''|| npsw=='' || ncpsw==''){
		$("#result").html("Please fill all fields!");
	}else{
		if(ncpsw==npsw){
			document.getElementById('frm-updateAcc').reset();
			$.ajax({
				url: 'valUpdateAccount.php',
				type:"POST",
        		cache:false,
        		data: {
        			ncpsw:ncpsw,
        			gname:gname,
        			opsw:opsw

        	},
        	success: function (data) {
            //alert("Data Loaded:");
            	$("#result").html(data);
        	}
			});
		}else{
			$("#result").html("Password Didnt Match!");
		}		
	}

	
	

});