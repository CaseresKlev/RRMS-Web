<?php


if(isset($_POST)){
		$issn = $_POST['issn'];
		$journal = $_POST['journal'];
		$type = $_POST['type'];
		$date = $_POST['date'];
		$book_id = $_POST['book_id'];


		include_once 'connection.php';
    	$dbconfig = new dbconfig();
    	$conn = $dbconfig->getCon();
    	$query = "INSERT INTO `published` (`id`, `book_id`, `issn`, `journal`, `type`, `date`) VALUES (NULL, '$book_id', '$issn', '$journal', '$type', '$date')";

    	//echo $query;
    	$result = $conn->query($query);
    	if($result){
    		echo "Update Successful!";
    	}
}

	
	
	

?>