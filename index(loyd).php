<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gallery Images</title>
	<link href="css/style(loyd).css" rel="stylesheet"/>
</head>

<header><?php include_once 'header.php'; ?></header>
<body class="indexbody">

	<div class="title">

	</div>
	<div class="content">
		<?php
		include_once 'connection.php';
		$dbconfig= new dbconfig();
		$con= $dbconfig -> getCon();
		$query= "SELECT book_id, book_title, cover, docloc FROM `book` WHERE 1 ORDER BY pub_date ASC;";
		$result = $con -> query($query);
		if ($result->num_rows>0) {

			while ($row=$result->fetch_assoc()) {

				//echo $row['book_title'];

		?>
	<div class="responsive">
		<div class="gallery">
			<a href="bookdetails.php?book_id= <?php echo $row['book_id']; ?>">
				<img src="<?php echo $row['cover']; ?>"alt="1"/>
			</a>
			<div class="title"><strong><?php echo $row['book_title'];?></strong></div>

			<div class="title">

				<?php
				//for author
				$dbconfig= new dbconfig();
				$con= $dbconfig -> getCon();
				$query= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id";
				$result = $con -> query($query);
				$autorList ="";
				if($result->num_rows>0){
					while ($row = $result->fetch_assoc()) {
						$autorList .= $row['a_lname'] . ", " . $row['a_fname'] . "; ";
						// use this ---> echo $row['a_lname'] . ", " . $row['a_fname'] . ";";;
					}
				}

				//end for authors
				//echo $autorList;
				$splitArr = explode(";", $autorList);
				?>
				 <i><?php
				 if(count($splitArr)>2){
					 echo $splitArr[0] . " et. al";
				 }else{
					 echo $splitArr[0];
				 }


				 ?></i>

			 </div>
		</div>
		<hr>
	</div>

	<?php }
}?>
			</div>





</div>



</body>
		<footer>
			<?php include_once 'header.php'; ?>
	</footer>
</html>
