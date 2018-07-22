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
        //echo $cleanEntry . " " . strlen($cleanEntry). "<br />";
        //INSERT INTO `dictionary` (`id`, `word`, `index_count`) VALUES (NULL, 'a', '0')
        //
        //echo $query . "<br />";
        //$conn = getCon();
        
        //$query = "SELECT id FROM `dictionary` WHERE word = \"$cleanEntry\"";
        $query = "SELECT id FROM `dictionary` WHERE word = '$cleanEntry';";
        
        if (strlen($cleanEntry)>0){
            //echo strlen($cleanEntry) . "\t";
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