<?php
   
    //$testWord = "a";
    //cleanWord($testWord);
    Function cleanWord($testWord){
        //echo $testWord . "<br />";
        //echo strlen($testWord);
        //$quot = "\"";
        include ('dbconfig.php');
        $pattern = '/[.,!:?]/';
        //$pattern = "\"";
        $testWord = str_replace('“',"",$testWord);
        $testWord = str_replace('”',"",$testWord);
        $testWord = str_replace("(","",$testWord);
        $testWord = str_replace(")","",$testWord);
        $testWord = str_replace("\"","",$testWord);
        $testWord = str_replace("]","",$testWord);
        $testWord = str_replace("[","",$testWord);
        $strlen = strlen($testWord);
        $cleanEntry = "";

        $tempAr = preg_split($pattern,$testWord);
        foreach($tempAr as $letters){
            $cleanEntry .= $letters;
        }

        $query = "SELECT id FROM `dictionary` WHERE word = '$cleanEntry';";
        
        if (strlen($cleanEntry)>0){
            $id = $conn->query($query);
            if ($id->num_rows > 0){
                foreach ($id as $idnum){
                    echo "Word: " . $cleanEntry . "\tFound at id: " . $idnum['id'] . "<br/>";
                }
            } else {
                $query = "INSERT INTO `dictionary` (`id`, `word`, `index_count`) VALUES (NULL, '$cleanEntry', '0')";
                //echo $query;
                $result = $conn->query($query);
                echo $cleanEntry . " Done <br/>";
            };
        } 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OpenFile</title>

    <script type="text/javascript" src="jquery.form.js"></script>
    <script type="text/javascript">
        <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
    </script> 
    </script>
</head>
<body>
    <form id="upload" action="uploadFile.php" class="group" onclick="startIndexing()" enctype="multipart/form-data" method="POST">
        <label for="file">Chose a file to upload</label><br>
        <input type="file" name="file" id="pictures"><br>
        <label for="cover">Chose Cover</label><br>
        <input type="file" name="cover" id="pictures"><br>
        <input type="submit">
    </form>


    <form id="myForm" action="try.php" method="post"> 
        Name: <input type="text" name="name" /> 
        Comment: <textarea name="comment"></textarea> 
        <input type="submit" value="Submit Comment" /> 
    </form>
</body>
</html>