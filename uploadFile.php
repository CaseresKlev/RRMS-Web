<?php
/*
    $temp_name = $_FILES['fileup']['tmp_name'];
    $uploadname = $_FILES['fileup']['name'];
    $ext = pathinfo($uploadname, PATHINFO_EXTENSION);
    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $savedate = date("mdy-hms-u".$micro, $t);
    
    //$newfilename = "./uploads/".basename($savedate."-".$uploadname);
    $newfilename = "./uploads/".basename($savedate.".".$ext);
    echo $newfilename."<br>";
    
    if(move_uploaded_file($temp_name,$newfilename)){
        echo "File Uploaded!";
    }else{
        echo "Error in Uploading file";
    }*/


    ///----FILE DOCX-----///
    $file = $_FILES['file'];
    $temp_file = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $error = $_FILES['file']['error'];
    $fileext = explode(".",$filename);
    $extension = strtolower(end($fileext));
    $allowedFile = array('docx', 'doc');


    echo "Book Details: <br/>";
    echo $temp_file . "\n";
    echo $temp_file ." <br/>";
    echo $filename ." <br/>";
    echo $filesize ." <br/>";
    echo $filetype ." <br/>";
    echo $error ." <br/>";
    echo $extension ." <br/><br/><br/>";
    if(in_array($extension, $allowedFile)){
            if($error===0){
                //45MB Allowed
                if($filesize<45000000){
                    $newFileName = uniqid('',true) . "." . $extension;
                    $serverPath = "./book/" . $newFileName;
                    
                    $FileFullpath = $serverPath;
                    move_uploaded_file($temp_file, $FileFullpath);
                    echo "File Uploaded!";
                }else{
                    echo "File Exceeded in Maximu File size"; 
                }
            }else{
                echo "There was error Uploading your File!";
            }
    }else{
        echo "File is Not Valid!";
    }
    ///-----------------///

    
    ///----COVER FILE----///
    $Cover = $_FILES['cover'];
    $temp_cover = $_FILES['cover']['tmp_name'];
    $Covername = $_FILES['cover']['name'];
    $Coversize = $_FILES['cover']['size'];
    $Covertype = $_FILES['cover']['type'];
    $Covererror = $_FILES['cover']['error'];
    $Coversize = $_FILES['cover']['size'];
    $Coverext = explode(".",$Covername);
    $Coverextension = strtolower(end($Coverext));
    $allowedCover = array('jpg', 'png', 'jpeg');

    echo "Cover Details: <br/>";
    echo $temp_cover . "\n";
    echo $filename ." <br/>";
    echo $filesize ." <br/>";
    echo $filetype ." <br/>";
    echo $error ." <br/>";
    echo $extension ." <br/><br/><br/>";

    if(in_array($Coverextension, $allowedCover)){
        if($Covererror===0){
            //45MB Allowed
            if($Coversize<45000000){
                $newCoverName = uniqid('',true) . "." . $Coverextension;
                $serverPath = "./cover/" . $newCoverName;
                

                $CoverFullpath = $serverPath;
                move_uploaded_file($temp_cover, $CoverFullpath);
                 echo "File Uploaded!";
            }else{
                echo "Cover Exceeded in Maximu File size"; 
            }
        }else{
            echo "There was error Uploading your Cover!";
        }
    }else{
    echo "Cover is Not Valid!";
    }


?>