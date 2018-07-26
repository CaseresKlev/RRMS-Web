<?php
	
		// POST BOOK //

		$title = $_POST['title'];
		$abs = $_POST['abstract'];
		$pubdate = $_POST['pubdate'];
		$dept = $_POST['dept'];
		$keywordsArray = $_POST['kw'];

		// POST AUTHOUR //
		$autlist = $_POST['autlist'];

		 //implementation of array
		/*foreach ($autlist as $kw) {
			//author
			$autor = explode(",", $kw);
			echo "first Name: " . $autor[0] . " Mname: " . $autor[1] . "lname: " . $autor[2] . " suf: " . $autor[3] . "add: " . $autor[4] . " contact: " . $autor[5] . " email: " . $autor[6];
		}*/
		//echo $kw . " From DB";

	

?>