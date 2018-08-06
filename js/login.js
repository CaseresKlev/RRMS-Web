//ANNE

$("#submit").click(function() {
  //alert("Hello");
  if ($("#u_name").val()==="" || $("#password").val()==="" ) {
    alert("Please fill all fields!");
  }
  else {
    var uname = $("#u_name").val();
    var upass = $("#password").val();
    //alert(uname);
    //alert(upass);

    $.ajax({
      url:"validatelogin.php",
      type:"POST",
      cache:false,
      data:{
        username:uname,
        password:upass,
      },
      success: function(data) {
        $("#msg").html(data);
        $("#msg").show();
      }

    });
  }
})
