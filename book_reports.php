<?php
	
	session_start();
	if(isset($_SESSION['uid'])){
		//print_r($_SESSION);
	}else{
		//echo "Not Login";
	}

?>


<!DOCTYPE html>
<html >
<head>
	<title>RRMS Reports</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="css/book_reports.css" />-->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/print.js"></script>
	<style type="text/css">
		table, tr, td{
    	border-collapse: collapse;
    	text-align: left;
    	word-wrap:break-word;
    	
		}

		#logo{
			padding-right: 18%;
		}

		body * {
			/*margin-left: auto; 
			margin-right: auto;*/
			-webkit-print-color-adjust: exact !important;
		}

		#line{
			width:100%; height:3px; background-color:  #1f2833
		}
		#line-up{
			width:100%;
			background-color: white;
			height: 30px;

		}

		#left-b{
			background-color:  #1f2833;
			width: 100%;
			display: inline-block;
		}

		@page{
  			margin-left: 0mm;
  			margin-top: 0mm;

  			
		}

		@media print {
			#Header, #Footer { display: none !important; }
		}

		#example tr:nth-child(even) {
    		background-color: #dddddd;
		}

		#example{
			font-family: arial, sans-serif;
    		border-collapse: collapse;
   			 width: 100%;
		}

		#example tr{
			border: 1px solid #dddddd;
    		text-align: left;
    		padding: 8px;
		}

		#example td{
			border: 1px solid #dddddd;
    		text-align: left;
    		padding: 4px;
		}

		#example th{
			border: 1px solid #dddddd;
    		text-align: left;
    		padding: 4px;
    		text-align: center;
		}

		#filter{
			font-family: arial, sans-serif;
    		border-collapse: collapse;
   			 width: 100%;
		}

		#filter th{
			border: 1px solid #dddddd;
    		text-align: left;

		}






	</style>
    
</head>
<body id="print-area">

	<?php
  $connect = mysqli_connect("localhost", "root", "", "db_rrms");
  //$query ="SELECT * FROM book ORDER BY book_id DESC";
  $query = "SELECT DISTINCT (book.book_id), book.book_title, book.pub_date, (SELECT department.cat_name FROM department WHERE book.department = department.id) as 'dept', book.status, (SELECT concat('',(GROUP_CONCAT((select concat( author.a_lname, ',', SUBSTRING(author.a_fname, 1,1))) SEPARATOR '; '))) as authors FROM junc_authorbook INNER JOIN author on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id = book.book_id) AS 'authors' FROM book INNER JOIN junc_authorbook on book.book_id = junc_authorbook.book_id WHERE 1";
  $result = mysqli_query($connect, $query);


?>
	<div id="line-up">
		
	</div>
		<br/>

		<table width="100%">
			
			<tr>
				<td width="70px">
					<div id="left-b">
						
					</div>
					
				</td>
				<td>
					<div id="rep-banner">

						<table width="100%">
							<tr>
								<td rowspan="3" id="logo" width="150px">
									<img src="img/BukSU Logo.png" width="100px"; height="100px">
								</td>
								<td>
									<b style="font-size: 22pt">Bukidnon State University</b><br>
									<b style="font-size: 14pt; font-weight: normal;">Research and Developement Unit<br>
									Malaybalay City Bukidnon</b>
									</td>
							</tr>
							<tr>
								<td>
							
								</td>
							</tr>
							<tr>
								<td>
							
								</td>
							</tr>


						</table>

					</div>
					<br>
					<div id="line">
		
					</div>

					<center><h2>Reaseach Reports</h2></center>
					<table id="filter" width="100%">
						<tr>
              						<th width="5%"></th>
              						<th width="40%">Filter Title &nbsp; <textarea io="filte-title" style="width: 98%;" rows="6"></textarea></th>
              						<th width="15%">Filter Date <br><br>From:&nbsp;
              						<input type="number" name="from" Value = "2000" width="100%"><br>
              						To:&nbsp
              						<input type="number" name="from" Value = "2000" width="100%">

              						</th>
              						<th width="15%">
              							Filter Department:<br><br>
              							<select id="filter-dept" style="width: 100%">
              								<option>All</option>
              								<?php
              									include_once 'connection.php';
              									$dbconfig = new dbconfig();
              									$conn = $dbconfig->getCon();
              									$query = "SELECT `cat_name` FROM `department` WHERE 1";
              									$dept = $conn->query($query);

              									while ($rowdept = $dept->fetch_assoc()) {
              										echo "<option>" . $rowdept['cat_name'] . "</option>";
              									}

              								?>

              							</select>
              						</th>
              						<th width="15%">Filter Status:<br><br>
              							<select id="filter-stat" style="width: 100%">
              								<option>All</option>
              								<?php
              									include_once 'connection.php';
              									$dbconfig = new dbconfig();
              									$conn = $dbconfig->getCon();
              									$query = "SELECT DISTINCT (`status`) FROM `book` WHERE 1";
              									$dept = $conn->query($query);

              									while ($rowdept = $dept->fetch_assoc()) {
              										echo "<option>" . $rowdept['status'] . "</option>";
              									}

              								?>
              							</select>
              						</th>
              						<th width="20%">Filter Authors:<br>
              							<textarea io="filte-title" style="width: 98%;" rows="6"></textarea>
              						</th>
            					</tr>
					</table>
					<br>
					<br>
					<table id="example" class="display nowrap" cellspacing="0" width="100%">
          					<thead style="text-align: left;">
            					<tr>
              						<th width="5%">ID</th>
              						<th width="40%">Book Title</th>
              						<th width="15%">Date</th>
              						<th width="15%">Department</th>
              						<th width="15%">Status</th>
              						<th width="20%">Authors</th>
            					</tr>
          					</thead>
          			<tbody>
            		<?php

              		while ($row = mysqli_fetch_array($result)){
                			echo '
                  				<tr>
                    				<td>'.$row["book_id"].'</td>
                      				<td>'.$row["book_title"].'</td>
                        			<td>'.$row["pub_date"].'</td>
                          			<td>'.$row["dept"].'</td>
                            		<td>'.$row["status"].'</td>
                              		<td>'.$row["authors"].'</td>
                             	</tr>
                  			';
              }



              ?>
          </tbody>

        </table>
        <br>
        <div id="line">
		
		</div>
		<br>


		<button id="print" >Print</button>


				</td>
			</tr>
		
		
	


	</table>
	
	
	<script type="text/javascript">
		
		$("#print").click(function(){
			$(this).hide();
			$("#filter").hide();
			window.print();

		});

		$("#filter-dept").change(function(){
			var filter = $(this).val().toUpperCase();

			if(filter!="ALL"){
				var table,  tr, td, i;
				table = document.getElementById("example");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					
    				td = tr[i].getElementsByTagName("td")[3];


    				if(tr[i].style.display==""){
	    				if (td) {
	      					if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        					tr[i].style.display = "";
	     		 			} else {
	        					tr[i].style.display = "none";
	      					}
	    				}
    			}       
  			}
			}else{
				var table,  tr, td, i;
				table = document.getElementById("example");
				tr = tr = table.getElementsByTagName("tr");
				for(i=0; i<tr.length; i++){
					tr[i].style.display ="";
				}
			}
			
			//alert(dept);
		})

		$("#filter-stat").change(function(){
			var filter = $(this).val().toUpperCase();
			//alert(filter);

			if(filter!="ALL"){
				var table,  tr, td, i;
				table = document.getElementById("example");
				tr = table.getElementsByTagName("tr");



				
				for (i = 0; i < tr.length; i++) {
					//alert(tr[i].getElementsByTagName("td")[4]);
    				td = tr[i].getElementsByTagName("td")[4];

    				if(tr[i].style.display==""){
    					if (td) {
      						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        						tr[i].style.display = "";
     		 				} else {
        						tr[i].style.display = "none";
      						}
    					}       
    				}
    				
  			}
			}else{
				var table,  tr, td, i;
				table = document.getElementById("example");
				tr = tr = table.getElementsByTagName("tr");
				for(i=0; i<tr.length; i++){
					tr[i].style.display ="";
				}
			}
			
			//alert(dept);
		})

	</script>



</body>
</html>