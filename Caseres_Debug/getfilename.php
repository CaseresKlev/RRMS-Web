<?php

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $error = $_FILES['file']['error'];
    $fileext = explode(".",$filename);
    $extension = strtolower(end($fileext));
    $allowedFile = array('docx', 'doc');

    echo $filename ." <br/>";
    echo $filesize ." <br/>";
    echo $filetype ." <br/>";
    echo $error ." <br/>";
    echo $fileext ." <br/>";
    
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
}

?>