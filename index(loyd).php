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
		$query= "SELECT book_id, book_title FROM `book` WHERE 1 ORDER BY pub_date ASC";
		$result = $con -> query($query);
		if ($result->num_rows>0) {

			while ($row=$result->fetch_assoc()) {

				//echo $row['book_title'];

		?>
	<div class="responsive">
		<div class="gallery">
			<a href="bookdetails.php?book_id= <?php echo $row['book_id']; ?>">
				<img src="images/1.jpg" alt="1"/>
			</a>
			<div class="title"><strong><?php echo $row['book_title'];?></strong></div>

			<div class="title"><i>loyd anthony et. al</i></div>
		</div>
		<hr>
	</div>

	<?php }
}?>
			</div>





</body>
		<footer>
				<?php include_once 'footer.php'; ?>
	</footer>
</html>
