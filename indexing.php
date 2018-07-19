<?php
   
    //$testWord = "K:l,e!v?i\"e.";
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
       /* for( $i = 0; $i <= $strlen; $i++ ) {
            $char = substr( $testWord, $i, 1 );
            if(!($char === '.'||$char === ',' || $char === '!'|| $char === '?' || $char === ':' || $char === '(')){
                $cleanEntry .= $char;
            }
        }*/
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
        $query = "INSERT INTO `dictionary` (`id`, `word`, `index_count`) VALUES (NULL, '$cleanEntry', '0')";
        echo $query;
        $result = $conn->query($query);
        //$row = $result->fetch_assoc();
        //echo $cleanEntry . " " . $row['id'] . "<br />";
        echo " Done <br/>";
        //$conn->close();
    }

    
    
?>