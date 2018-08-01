<?php
        include_once 'connection.php';
        
        $title = $_POST['title'];
        //echo "Tittle: $title </br>";

        $abs = $_POST['abstract'];
        //echo "abstract: $abs </br>";

        $pubdate = $_POST['pubdate'];
        //echo "pubdate: $pubdate </br>";

        $dept = $_POST['dept'];
        //echo "Department: $dept </br>";

        $keywordsArray = $_POST['kw'];
        //echo "Array of Keywords: ";
        //print_r($keywordsArray);
        //echo "<br/>";


        $referencesArray=$_POST['ref'];
        //echo "Array of References: ";
        //print_r($referencesArray);
        //echo "<br/>";

        $stat = $_POST['stat'];
        //echo "Status: $stat </br>";


        $fname = $_POST['firstname'];
        //echo "Author Fname: ";
        //print_r($fname);
        //echo "<br/>";

        $mname = $_POST['middlename'];
        //echo "Author middlename: ";
        //print_r($mname);
        //echo "<br/>";

        $lname = $_POST['lastname'];
        //echo "Author lastname: ";
        //print_r($lname);
        //echo "<br/>";

        $suf = $_POST['suffix'];
        //echo "Author Suffix: ";
        //print_r($suf);
        //echo "<br/>";

        $add = $_POST['address'];
        //echo "Author address: ";
        //print_r($add);
        //echo "<br/>";

        $contact = $_POST['contact'];
        //echo "Author Contact: ";
        //print_r($contact);
        //echo "<br/>";

        $email = $_POST['email'];
        //echo "Author email: ";
        //print_r($email);
        //echo "<br/>";

        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();

        //note get department id
        //keywords id
        //reference id
        //dugangan anh form ug published
        //set cover to null


        //get the department id
        $query = "SELECT id FROM `department` WHERE cat_name = \"$dept\"";
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $result = $conn->query($query);
        $deptid = null;

        if($result->num_rows>0){
            while ($row=$result->fetch_assoc()) {
                $deptid = $row['id'];
            }
            
        }
        
        ////--------------Book Insertion--------------------////

        //check if tittle already existed
        $query = "SELECT book_id FROM `book` WHERE book_title = '$title'";
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $result = $conn ->query($query);

        $book_id = null;

        //if not on db then load to db and return id
        if($result->num_rows>0){
            echo "Book Already Exsist!";
        }else{
            //query for book details insertion
            $query = "INSERT INTO `book` (`book_id`, `book_title`, `abstract`, `pub_date`, `department`, `rev_count`, `status`, `enabled`, `views_count`, `cover`, `docloc`) VALUES (NULL, '$title', '$abs', '$pubdate', '$deptid', '0', '$stat', '0', '0', '', '')";
       // echo "<br/>" . $query;
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $result = $conn ->query($query);

            $query = "SELECT book_id FROM `book` WHERE book_title = '$title'";
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $result = $conn ->query($query);
            if($result->num_rows>0){
                while ($row=$result->fetch_assoc()) {
                    $book_id = $row['book_id'];
<<<<<<< HEAD
                }
            }

            if($result){
                echo "Book Loaded";
            }
        }

        ////--------------End of Book Insertion--------------------////

        ////--------------Author Insertion--------------------////

        //prepare the arrays of authors//

        $autorID = array();
        for($i=0; $i<count($fname); $i++){
            //echo "<br/>First Name: " . $fname[$i] . " Middlename: " . $mname[$i] ." Lastname: " . $lname[$i] . " Suffix: " .$suf[$i] . " Address: " . $add[$i] . " Contact: " . $contact[$i] . " Email: " . $email[$i];

            $query= "SELECT a_id FROM author where a_fname='$fname[$i]' and a_mname='$mname[$i]' and a_lname='$lname[$i]' and a_suffix='$suf[$i]'";
            echo $query;
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $result = $conn ->query($query);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    array_push($autorID, $row['a_id']);
                }
            }


        }

        print_r($autorID);

        
        

        

=======
                }
            }

            ////--------------Author Insertion--------------------////
            //LOAD THE AUTHORS IF THE BOOK IS VALID ELSE DONT LOAD THE AUTHOR //

            //prepare the arrays of authors//

            $autorID = array();
            for($i=0; $i<count($fname); $i++){
                //echo "<br/>First Name: " . $fname[$i] . " Middlename: " . $mname[$i] ." Lastname: " . $lname[$i] . " Suffix: " .$suf[$i] . " Address: " . $add[$i] . " Contact: " . $contact[$i] . " Email: " . $email[$i];

                $query= "SELECT a_id FROM author where a_fname='$fname[$i]' and a_mname='$mname[$i]' and a_lname='$lname[$i]' and a_suffix='$suf[$i]'";
                //echo $query;
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                    
                    $conn->query($query);
                    array_push($autorID, $row['a_id']);
                }
            }


            }

            //insert junction Author Book
            foreach ($autorID as $key){
            
                $query = "INSERT INTO `junc_authorbook` (`id`, `book_id`, `aut_id`) VALUES (NULL, $book_id, $key)";
                // echo $query;
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $conn ->query($query);
                echo "Loaded <br/>";
            }

            ///------------END OF AUTHOR INSERTION-----------///


            ///------------START OF KEYWORDS INSERTION-------///



            ///------------END OF RESEACRH INSERTION--------///
            }

        ////--------------End of Book Insertion--------------------////


        

        

>>>>>>> 129f992aef26d5b3476984b92e4bd426b493b4df
    
?>