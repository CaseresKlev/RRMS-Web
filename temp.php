<?php
	
		// POST BOOK //

		$title = $_POST['title'];
		$abs = $_POST['abstract'];
		$pubdate = $_POST['pubdate'];
		$dept = $_POST['dept'];
		$keywordsArray = $_POST['kw'];

		// POST AUTHOUR //
		//$autlist = $_POST['autlist'];

		 //implementation of array
		/*foreach ($autlist as $kw) {
			//author
			$autor = explode(",", $kw);
			echo "first Name: " . $autor[0] . " Mname: " . $autor[1] . "lname: " . $autor[2] . " suf: " . $autor[3] . "add: " . $autor[4] . " contact: " . $autor[5] . " email: " . $autor[6];
		}*/
		//echo $kw . " From DB";


		///----FILE DOCX-----///
   /* $file = $_FILES['book'];
    $filename = $_FILES['book']['name'];
    $filesize = $_FILES['book']['size'];
    $filetype = $_FILES['book']['type'];
    $error = $_FILES['book']['error'];
    //$filesize = $_FILES['book']['size'];
    $fileext = explode(".",$filename);
    $extension = strtolower(end($fileext));


    echo $filename;
    echo $filesize;
    echo $filetype;
    echo $error;

    $allowedFile = array('docx', 'doc');
    if(in_array($extension, $allowedFile)){
            if($error===0){
                //45MB Allowed
                if($filesize<45000000){
                    $newFileName = uniqid('',true) . "." . $extension;
                    $serverPath = "book/" . $newFileName;
                    
                    $FileFullpath = $serverPath;
                    echo "Book: " . $FileFullpath . "<br/>";
                }else{
                    echo "File Exceeded in Maximu File size"; 
                }
            }else{
                echo "There was error Uploading your File!";
            }
    }else{
        echo "File is Not Valid!";
    }

	*/

?>