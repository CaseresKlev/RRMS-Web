<?php
	$count = $_POST['count'];
	$type = $_POST['type'];
	//echo $type;

	
	

	
	$accesskey = array();
	

	//while($i<=5){
	include_once 'connection.php';
	$dbconfig = new dbconfig();
	$conn = $dbconfig->getCon();


	for($i=1; $i<=$count; $i++){

		$key = getRandomString(8);
		$date = date("Y-m-d");


		
		$query = "INSERT INTO `acesskey` (`id`, `acesskey`, `type`, `used`, `date`) VALUES (NULL, '$key', '$type', '0', '$date')";
		$result = $conn ->query($query);
		//echo $query;
		//echo $result;
		if($result){
			array_push($accesskey, $key);

		}
		
	}

	//print_r($accesskey);
	foreach ($accesskey as $key) {
		echo $key . "-";
	}



	function getRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}
?>