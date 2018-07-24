<?php

//Book Details

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $error = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];
    $fileext = explode(".",$filename);
    $extension = strtolower(end($fileext));
    $allowedFile = array('docx', 'doc');
    //echo $filename ."<br/>";    
    //echo $extension;
    if(in_array($extension, $allowedFile)){
            if($error===0){
                //50MB Allowed
                if($filesize<50000){
                    
                }else{
                    echo "File Exceeded in Maximu File size";
                }

            }else{
                echo "There was error Uploading your File!";
            }
    }else{
        echo "File is Not Valid!";
    }
}



?>