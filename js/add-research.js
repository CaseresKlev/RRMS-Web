

var n = 1;
function init(){
   showCurrentPage(n, "page" + n);
   //addInput();
}
    


function addInput(){
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



function setPage(action) {
if(action == "prev"){
    if(n>1){
        n -=1;
    }
}else{
    n +=1;
}
showCurrentPage();
}

function showCurrentPage(){
if (n==1){
    alert("Hellow " + n);
 document.getElementsById("enclosure").style.display = "none";
 document.getElementById("page").innerHTML = "Page 1";
}
if(n==2){
    document.getElementsByClassName("div-author").style.display = "block";
}
}