$("#submit").click(function(){
  var g_name=$("#g_name").val();

  var u_name=$("#u_name").val();
  var access=$("#access").val();
  var upass=$("#password").val();

  //alert(upass.length);
  if (g_name===''|| u_name==='' || upass==='') {
    alert("Please fill all fields!");
  }else if(upass.length>12 || u_name.length>12){
    alert("Notice: Maximum of length or username or password is 12 character");

  }else {
    //alert("else");
    $.ajax({
      url:"validate.php",
      type:"POST",
      cache:false,
      data:{
        access: access,
        groupname:g_name,
        uname:u_name,
        password:upass

      },
      success: function (data) {
          //alert(data);
          var str=data.split(":");
          //alert(str[0]);
          if (str[0]==="Success") {
            alert(data);
        $(".boxx")[0].reset();
            window.location.replace("new-login.php");
          }else {
            alert(data);
          }

           //

          //$("#result").html(data);
      }



    });

  }



})
