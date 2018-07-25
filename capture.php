<?php

if(isset($_POST["submit"]) && is_array($_POST["fname"])){
    $subject = implode(", ", $_POST["fname"]);
    print_r($subject);
}

?>