<?php
	if(isset($_POST['trail_id'])){
		$trail_id = $_POST['trail_id'];
		$book_id = $_POST['book_id'];
		$page = $_POST['page'];

		include_once 'connection.php';
		$dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $query = "UPDATE `comments` SET `page` = '$page' WHERE `comments`.`trail_id` = $trail_id";
        $result = $conn->query($query);
        if($result){
        	echo "Success";
        }
	}

?>