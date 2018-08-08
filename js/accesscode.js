$("#admin-btn-generate").click(function(){
		var count = $("#access-count").val();
		var type = "instructor";
		//alert(count); 
		if(count<1){
			alert("Please input greater than 0");
		}else{
			$.ajax({
			url: "getAccessCodes.php",
    		type:"POST",
    		cache:false,
    		data:{
    			count:count,
    			type:type

    		},
    		//onProgress: function(event,position,total,percentCompelete)
    		onProgress: function(e)

               {
                  //$("#prog").attr('value',percentCompelete); 
                   //$("#percent").html(percentCompelete+'%');
                   alert(e);
               },
    		success: function(data){
    			var str = data.split("-");
    			//alert(str[str.length-2]);
    			//alert(data[0]);
    			//alert(str);
    			//alert(str.length);
    			var i;
    			for(i=0; i<str.length-1; i++){
    				var row = '<tr class="access-tr"> \
								<td id="access-th">' + (i+1) + ' </b> </td> \
								<td id="access-th">'+ str[i] + ' </td> \
								<td id="access-th">'+ 'Instructor' + ' </td> \
							</tr>';

				$("#tbl-accescodes").append(row);
    			}
    			
    		}



		});
		}

		


	
});