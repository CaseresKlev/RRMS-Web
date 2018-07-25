

var n = 1;
(function () {
    for (i=1; i<=3; i++){
         document.getElementById("page" +i).style.display = "none";
    }
    alert("load");
    showCurrentPage(n, "page" + n);
}());


function setPage(action) {
if(action == "prev"){
    if(n>1){
        n -=1;
    }
}else{
    n +=1;
}

var page = "page" + n;

for (i=1; i<=3; i++){
document.getElementById("page" +i).style.display = "none";
}
showCurrentPage(n,page);
}

function showCurrentPage(n,page){
document.getElementById(page).style.display = "block";
if (n==1){
    document.getElementById("btn_prev").style.display = "none";
}else{
    document.getElementById("btn_prev").style.display = "inline-block";
}

if (n==3){
    document.getElementById("btn_next").style.display = "none";
    document.getElementById("btn_submit").style.display = "inline-block";
}else{
    document.getElementById("btn_next").style.display = "inline-block";
    document.getElementById("btn_submit").style.display = "none";
}
}

function loadToTable(){
    alert("HELLOW");
    var fname = document.getElementById("fname").value;
    var mname = document.getElementById("mname").value;
    var lname = document.getElementById("lname").value;
    var suf = document.getElementById("suf").value;
    var add = document.getElementById("add").value;
    var contact = document.getElementById("contact").value;
    var email = document.getElementById("email").value;

    var table = document.getElementById("author-table");
    var row = table.insertRow(1);
    row.insertCell(0).innerHTML=fname;
    row.insertCell(1).innerHTML=mname;
    row.insertCell(2).innerHTML=lname;
    row.insertCell(3).innerHTML=suf;
    row.insertCell(4).innerHTML=add;
    row.insertCell(5).innerHTML=contact;
    row.insertCell(6).innerHTML=email;
    document.getElementById("fname").value = "";
    document.getElementById("mname").value = "";
    document.getElementById("lname").value = "";
    document.getElementById("suf").value = "";
    document.getElementById("add").value = "";
    document.getElementById("contact").value = "";
    document.getElementById("email").value = "";

}