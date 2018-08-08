

            ///place all your jquery functions here///
            var page = 1;
            var fields = 1;

            setPage();


            $("#next").click(function(){

                if(page<3){

                    if(page==1){
                        if($("#title").val()==="" || $("#abstract").val()==="" || $("#pubdate").val()==="" || $("#department").val()==="" || $("#reference").val()==="" || $("#pubdate").val()===""){
                            alert("Please fill all fileds!");
                        }else{
                            page++;
                            setPage();
                        }

                    }else if(page==2){
                      /*  if($("#title").val()==="" || $("#abstract").val()==="" || $("#pubdate").val()==="" || $("#department").val()==="" || $("#reference").val()==="" || $("#pubdate").val()===""){
                            alert("Please fill all fileds!");
                        }else{
                            page++;
                            setPage();
                        } */
                        //author details variables
                        var fname = $("input[name='fname[]']").map(function(){return $(this).val();}).get();
                        //alert(fname);
                        var mname = $("input[name='mname[]']").map(function(){return $(this).val();}).get();
                        //alert(mname);
                        var lname = $("input[name='lname[]']").map(function(){return $(this).val();}).get();
                        //alert(lname);
                        var suf = $("select[name='suf[]']").map(function(){return $(this).val();}).get();
                        //alert(suf);
                        var add = $("input[name='add[]']").map(function(){return $(this).val();}).get();
                        //alert(add);
                        var contact = $("input[name='contact[]']").map(function(){return $(this).val();}).get();
                        // alert(contact);
                        var email = $("input[name='email[]']").map(function(){return $(this).val();}).get();
                        // alert(email);

                        if(fname.every(checkName) && mname.every(checkName) && lname.every(checkName) && add.every(checkName) && contact.every(checkName) && email.every(checkName)){
                            page++;
                            setPage();
                        }else{
                            alert("Please fill all fileds!");
                        }
                    }
                    
                    
                }
            })

            function checkName(values){
                 
               return values !=="";

            }

            //previouse button click
            $("#prev").click(function(){
                if(page>1){
                    page--;
                    setPage();
                }
            })

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

           $("#submit").click(function(){

                //book details variable
                var title = $("#title").val();
                //alert(title);
                var abs = $("#abstract").val();
                //alert(abs);
                var pubdate = $("#pubdate").val();
                //alert(pubdate);
                var dept = $("#department").val();
                //alert(dept);
                var kw = $("#keywords").val().split("\n");
                //alert(kw);
                var ref = $("#reference").val().split("\n");
                //alert(ref);

                var stat = $("#status").val();
               // alert(stat);

                //author details variables
                var fname = $("input[name='fname[]']").map(function(){return $(this).val();}).get();
                //alert(fname);
                var mname = $("input[name='mname[]']").map(function(){return $(this).val();}).get();
                //alert(mname);
                var lname = $("input[name='lname[]']").map(function(){return $(this).val();}).get();
                //alert(lname);
                var suf = $("select[name='suf[]']").map(function(){return $(this).val();}).get();
                //alert(suf);
                var add = $("input[name='add[]']").map(function(){return $(this).val();}).get();
                //alert(add);
                var contact = $("input[name='contact[]']").map(function(){return $(this).val();}).get();
               // alert(contact);
                var email = $("input[name='email[]']").map(function(){return $(this).val();}).get();
               // alert(email);


               //adviser details
               var adv_fname = $("#adv_fname").val();
               //alert(adv_fname);

               var adv_mname = $("#adv_mname").val();
               //alert(adv_mname);

               var adv_lname = $("#adv_lname").val();
               //alert(adv_lname);

               var adv_suff = $("#adv_suff").val();
               //alert(adv_suff);

               var adv_email = $("#adv_email").val();
               //alert(adv_email);


                //validation of author details
                var authorList = new Array();
                var aut;
                for(i=0; i<fname.length; i++){
                    if (fname[i].length == 0 || mname[i].length == 0 || lname[i].length == 0 || add[i].length == 0 || contact[i].length == 0 || email[i].length == 0){
                        //alert("misiing");
                    }else{
                      aut   = fname[i] + "," + mname[i] + "," + lname[i] + "," + suf[i] + "," + add[i] + "," + contact[i] + "," + email[i];
                        authorList.push(aut);
                    }
                }




                //ajax post
               $.ajax({
                url:"temp.php",
                type:"POST",
                cache:false,
                data:{           // multiple data sent using ajax
                    title:title,
                    abstract:abs,
                    pubdate:pubdate,
                    dept:dept,
                    kw:kw,
                    ref:ref,
                    stat: stat,
                    firstname: fname,
                    middlename: mname,
                    lastname: lname,
                    suffix: suf,
                    address: add,
                    contact: contact,
                    email: email,
                    adv_fname : adv_fname,
                    adv_mname : adv_mname,
                    adv_lname : adv_lname,
                    adv_suff : adv_suff,
                    adv_email : adv_email

                },
                success: function (data) {

                    var str = data.split(":");

                    if(str[0]==="error"){
                        alert(str[1]);
                    }else{
                        window.location.href = "acceptbook.php?book_id=" + str[2]; 
                    }
                   // $("#debug").html(data);
                          

                    $("#debug").html(data);

                }
            });


           })




            $("#addField").click(function(){
                var row = '<tr id="row'+ fields + '"> \
                             <td><input type="text" placeholder="First Name" oninput="this.className = \'\'" id="adv_mname" name="fname[]"></td> \
                             <td><input type="text" placeholder="Middle name" oninput="this.className = \'\'" id="adv_mname" name="mname[]"></td> \
                             <td><input type="text" placeholder="Last name" oninput="this.className = \'\'" id="adv_mname" name="lname[]"></td> \
                             <td><select id="sufname" name="suf[]">  \
                             <option></option> \
                             <option>JR</option> \
                             <option>IV</option> \
                             <option>III</option> \
                             </select></td> \
                             <td><input type="text" placeholder="Address" oninput="this.className = \'\'" id="adv_mname" name="add[]"></td> \
                             <td><input type="text" placeholder="Contact" oninput="this.className = \'\'" id="adv_mname" name="contact[]"></td> \
                             <td><input type="text" placeholder="Email" oninput="this.className = \'\'" id="adv_mname" name="email[]"></td> \
                             <td><button type="button" name="remove" id="'+fields+'" class="btn_remove">Remove</button></td>\
                        </tr>';
                             fields = fields + 1;

                $("#aut_list").append(row);
            });

            //remove field handling
             $(document).on('click', '.btn_remove', function(){
                var btn_id = $(this).attr("id");
                $('#row'+btn_id+'').remove();
            })


            //page handling
            function setPage(){
                $("#aut_list").show();
                //alert(page);
                if(page==1){
                    $("#prev").hide();
                    $("#submit").hide();
                    $("#next").show();
                    $("#page2").hide();
                    $("#page3").hide();
                    $("#page1").slideDown("slow");
                }else if(page==2){
                    $("#prev").show();
                    $("#submit").hide();
                    $("#next").show();
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
                //alert("hellow");

               /* $.ajax({
                    url:"getAuthor.php",
                    type:"POST",
                    cache:false,
                    data: {name:nameArr},
                    success: function(data){
                        finalName = data.split("?");
                        //alert(finalName);
                                        //alert(finalName); */
                /*var fname = document.createElement("input");
                fname.type = "text";
                fname.name = "fname[]";
                fname.id="fname" + fields;
                fname.placeholder = "First Name";



                var mname = document.createElement("input");
                mname.type = "text";
                mname.name = "mname[]";
                mname.id="mname" + fields;
                mname.placeholder = "Middle Name";




                var lname = document.createElement("input");
                lname.type = "text";
                lname.name = "lname[]";
                lname.id="lname" + fields;
                lname.placeholder = "Lastname";



                var suf = document.createElement("input");
                suf.type = "text";
                suf.name = "suf[]";
                suf.id="suf" + fields;
                suf.placeholder = "Suffix (e.g: Jr. / Sr.)";



                var add = document.createElement("input");
                add.type = "text";
                add.name = "add[]";
                add.id="add" + fields;
                add.placeholder = "Address";



                var contact = document.createElement("input");
                contact.type = "text";
                contact.name = "contact[]";
                contact.id="contact" + fields;
                contact.placeholder = "Contact";



                var email = document.createElement("input");
                email.type = "text";
                email.name = "email[]";
                email.id="email" + fields;
                email.placeholder = "Email";

                var btnRem = document.createElement("button");
                btnRem.type = "button";
                btnRem.name = "remove";
                btnRem.id = "btnRem";
                btnRem.class = "btnRemove";
                btnRem.innerHTML = "Remove";



               // <?php    }
                //} ?>

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

                var removeCon = row.insertCell(7);
                removeCon.appendChild(btnRem);

                //var x = document.getElementById("authorName").options.namedItem(name).value;
                //
                //var x = document.getElementById("authorName").options.length;
                //document.getElementById('autSearch').value = '';
                //(data);
                //document.getElementById("authorName").options.namedItem(name).remove();
                */
                }



              /*  <?php
                include_once 'connection.php';
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $query= "SELECT * FROM author";
                    $result = $conn->query($query);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                ?> */
