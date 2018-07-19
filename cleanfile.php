<?php

include 'openDocs.php';
include 'indexing.php';

$kv_texts = kv_read_word('./Caseres_Debug/VOID MAIN-CHAPTER 3-Compiled.docx');
if($kv_texts !== false) {		
    $temp = nl2br($kv_texts);
    //$res = split('/<br[^>][" "]*>/i',$temp);
	//$res = preg_split('/\s+/',$temp);
	$noTags = strip_tags($temp);
	$phar = preg_split('[\n]', $noTags);
	//$res = preg_split('/[\s]+/',$noTags); <----------
   // $res = preg_split('[\n]',$temp); 
   $counter = 0;
   $pattern = '/[.,]/';
    foreach($phar as $p){
		//extract Pharagraph!

      /* if (strlen($w)>0){
			echo "--->$w " . " " .strlen($w) . "<br>";
			$counter++;
		} */
		
		//valid paragraphs should only contain > 15 words or greater
		$pharWords = preg_split("/\s+/", $p);

		//if words in pharagraph is >= 15 words then index the words
		if (count($pharWords)>15){
			//echo "<------------>" . $p . "<------------><br />";
				foreach($pharWords as $word){
					//echo $word . " " . strlen($word) . "<br />";
					cleanWord($word);
				}
			
		}

		
		//echo "Sentence: " . $counter++ . " :" . $w;
	}
	echo "Counts: " . $counter . "<br/>";	
}
else {
	echo "Cant Read that file.";
}
?>