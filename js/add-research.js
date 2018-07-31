// 'use-strict';

///place all your jquery functions here///
page = 1;
setPage();
initInput();

$('#next').click(function () {

    if (page < 3) {
      page++;
      setPage();
    }
  });

//previouse button click
$('#prev').click(function () {
    if (page > 1) {
      page--;
      setPage();
    }
  });

/// $("#submit").click(function(){
/* var values = $("input[name='fname[]']").map(function(){
                    return $(this).val();
                }).get();
                alert(values); */

//var title = $("#title").val();
// echo("hellow");
/*$.post('temp.php',{posttitle:title}, function(data){
                    alert(data);
                });*/
// })



///<------------ submit on jquery---------->////

$('#submit').click(function () {

    //book details variable
    var title = $('#title').val();
    var abs = $('#abstract').val();
    var pubdate = $('#pubdate').val();
    var dept = $('#department').val();
    var kw = $('#keywords').val().split('\n');


    //author details variables
    var fname = $("input[name='fname[]']").map(function () {return $(this).val();}).get();
    var mname = $("input[name='mname[]']").map(function () {return $(this).val();}).get();
    var lname = $("input[name='lname[]']").map(function () {return $(this).val();}).get();
    var suf = $("input[name='suf[]']").map(function () {return $(this).val();}).get();
    var add = $("input[name='add[]']").map(function () {return $(this).val();}).get();
    var contact = $("input[name='contact[]']").map(function () {return $(this).val();}).get();
    var email = $("input[name='email[]']").map(function () {return $(this).val();}).get();








    /// Book File ///

    // var fileSelect = document.getElementById("myFile");
    //var file = fileSelect.file;



    /*$("#myFile").fileupload({

              //options in file upload
              url: 'temp.php',
              dataType: 'json',
              autoUpload: false

          }).on('fileuploadadd', function(e, data){
              //alert("fileadded!");

              //we use regex expresion to check the file extension
              // the allowed files shoud be a .docx or doc file
              var allowedFile = /.\.(docx|doc)$/i;
              console.log("hellow");
          }).on('fileuploaddone', function(e, data){

          }).on('fileuploadprogressall', function(e, data){

          }); */


    /*
              alert(title);
              alert(abs);
              alert(pubdate);
              alert(dept);
              alert(kw);
              alert(authorList);
          */
    //validation of author details
    //var authorList = new Array();
    var autArr = new Array();
     var aut;
     for(i=0; i<fname.length; i++){
         if (fname[i].length == 0 || mname[i].length == 0 || lname[i].length == 0 || add[i].length == 0 || contact[i].length == 0 || email[i].length == 0){
             alert("misiing");
         }else{
           aut   = fname[i] + "," + mname[i] + "," + lname[i] + "," + suf[i] + "," + add[i] + "," + contact[i] + "," + email[i];
             autArr.push(aut);
         }
     }
     alert(fname);

     //ajax post
     $.post("temp.php",
         {
         title: title,        //tittle
         abstract: abs,       //abstract
         pubdate: pubdate,    //pubdate
         department: dept,          //department
         keywords: kw,
         gg:"helow",              //keywords
         authors : autArr  //authour array
         //firtsname: fname
         //book:book

         }, function(data){
         $("#here").html(data);
     });
})
           ///<------------end of submit on jquery---------->////


            $("#addField").click(function(){
                initInput();
            })




            //page handling
            function setPage(){
                if(page==1){
                    $("#prev").hide();
                    $("#submit").hide();
                    $("#next").show();
                    $("#page2").hide();
                    $("#page3").hide();
                    $("#page1").slideDown("slow");
                }else if(page==2){
                    $("#prev").show();
                    $("#page1").hide();
                    $("#page3").hide();
                    $("#page2").slideDown("slow");
                }else if(page==3){
                    $("#next").hide();
                    $("#submit").show();
                    $("#page1").hide();
                    $("#page2").hide();
                    $("#page3").slideDown("slow");
                }
            }

            //init author info field
            function initInput(){
                var fname = document.createElement("input");
                fname.type = "text";
                fname.name = "fname[]";
                fname.placeholder = "First Name";

                var mname = document.createElement("input");
                mname.type = "text";
                mname.name = "mname[]";
                mname.placeholder = "Middle Name";

                var lname = document.createElement("input");
                lname.type = "text";
                lname.name = "lname[]";
                lname.placeholder = "Lastname";

                var suf = document.createElement("input");
                suf.type = "text";
                suf.name = "suf[]";
                suf.placeholder = "Suffix (e.g: Jr. / Sr.)";

                var add = document.createElement("input");
                add.type = "text";
                add.name = "add[]";
                add.placeholder = "Address";

                var contact = document.createElement("input");
                contact.type = "text";
                contact.name = "contact[]";
                contact.placeholder = "Contact";

                var email = document.createElement("input");
                email.type = "text";
                email.name = "email[]";
                email.placeholder = "Email";

                var table = document.getElementById("aut_list");
                var row = table.insertRow(1);

                var fnameCon = row.insertCell(0);
                fnameCon.appendChild(fname);

                var mnameCon = row.insertCell(1);
                mnameCon.appendChild(mname);

                var lnameCon = row.insertCell(2);
                lnameCon.appendChild(lname);

                var sufCon = row.insertCell(3);
                sufCon.appendChild(suf);

                var addCon = row.insertCell(4);
                addCon.appendChild(add);

                var conCon = row.insertCell(5);
                conCon.appendChild(contact);

                var emailCon = row.insertCell(6);
                emailCon.appendChild(email);
            }
