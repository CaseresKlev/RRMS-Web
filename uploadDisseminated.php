<?php


//echo "GGGGG";

if(isset($_POST)){

		$distype = $_POST['dis-type'];
		$discon = $_POST['dis-con'];
		$conven = $_POST['con-ven'];
		$disdate = $_POST['disdate'];
		$files = $_FILES['myFile'];
		$book_id = $_POST['book_id'];


		//print_r($files);
		/*foreach ($_FILES['myFile'] as $key => $gg ) {
			# code...
			//echo $key['name']; 
			// /print_r($key);
			echo $gg['name'];
		}*/

		$count = count($_FILES['myFile']['tmp_name']);
for($i=0;$i<$count;$i++) {
    $file_name = $_FILES['myFile']['name'][$i];
    $fileTemp = $_FILES['myFile']['tmp_name'][$i];
    $file_type = $_FILES['myFile']['type'][$i];
    $file_error = $_FILES['myFile']['error'][$i];
    $file_size = $_FILES['myFile']['size'][$i];


    $fileext = explode(".",$file_name);
    $extension = strtolower(end($fileext));
    $finalname = "documents/" . uniqid('',true) . "." . $extension;
    if(move_uploaded_file($fileTemp, $finalname)){

    	include_once 'connection.php';
    	$dbconfig = new dbconfig();
    	$conn = $dbconfig->getCon();
    	$query = "INSERT INTO `documents` (`id`, `book_id`, `documents`) VALUES (NULL, '$book_id', '$finalname')";
    	$result = $conn->query($query);

    	

          //echo "Upload Done";
    }

    //echo "File: " . $i . ": " . $finalname ;
}

		$dbconfig = new dbconfig();
    	$conn = $dbconfig->getCon();
    	$query = "INSERT INTO `disseminated` (`id`, `book_id`, `type`, `convension`, `location`, `date`) VALUES (NULL, '$book_id', '$distype', '$discon', '$conven', '$disdate')";
    	$result = $conn->query($query);

        

		
}

?>