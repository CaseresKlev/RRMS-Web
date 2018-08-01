<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gallery Images</title>
	<link href="css/style(loyd).css" rel="stylesheet"/>
</head>

<header><?php include_once 'header.php'; ?></header>
<body>
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
			<a href="imagedetails.php?book_id= <?php echo $row['book_id']; ?>">
				<img src="images/1.jpg" alt="1"/>
			</a>
			<div class="title"><strong><?php echo $row['book_title'];?></strong></div>

			<div class="title"><i>loyd anthony et. al</i></div>
		</div>
	</div>

	<?php }
}?>


<!--	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/1.jpg" alt="1"/>
			</a>
			<div class="title"><strong>this is title</strong></div>
			<div class="title"><i>loyd anthony et. al</i></div>
		</div>
	</div>-->
</div>

<!--	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/2.jpg" alt="2"/>
			</a>
			<div class="desc">wanted palangga</div>
		</div>
	</div>

	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/3.jpg" alt="3"/>
			</a>
			<div class="desc">lorem ipsum</div>
		</div>
	</div>
	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/4.jpg" alt="4"/>
			</a>
			<div class="desc">lorem ipsum</div>
		</div>
	</div>


	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/7.jpg" alt="1"/>
			</a>
			<div class="desc">lorem ipsum</div>
		</div>
	</div>
	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/8.jpg" alt="2"/>
			</a>
			<div class="desc">This Description Here</div>
		</div>
	</div>
	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/9.jpg" alt="3"/>
			</a>
			<div class="desc">This Description Here</div>
		</div>
	</div>
	<div class="responsive">
		<div class="gallery">
			<a href="#" target="_blank">
				<img src="images/10.jpg" alt="4"/>
			</a>
			<div class="desc">This Description Here</div>
		</div>
	</div>
	<div class="responsive">-->

	<!--	<div class="gallery">
			<a href="images/5.jpg" target="_blank">
				<img src="images/5.jpg" alt="5"/>
			</a>
			<div class="desc">This Description Here</div>
		</div>
	</div>
	<div class="responsive">
		<div class="gallery">
			<a href="images/6.jpg" target="_blank">
				<img src="images/6.jpg" alt="6"/>
			</a>
			<div class="desc">This Description Here</div>
		</div>
	</div>


	<div class="clearfix"></div> -->

<!--	<div class="imgdropdown">
		<img src="images/1.jpg" width="200"/>
		<div class="wrapimg">
			<img src="images/1.jpg" class="imgdown">
			<div class="descdown">This Description Here</div>
		</div>
	</div>
	<div class="imgdropdown">
		<img src="images/2.jpg" width="200"/>
		<div class="wrapimg">
			<img src="images/2.jpg" class="imgdown">
			<div class="descdown">This Description Here</div>
		</div>
	</div> -->

	<!--<p><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></p>-->

</body>
</html>
