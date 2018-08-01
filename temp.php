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
                }
            }

            echo "Done Inserting Book Details <br/>";

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
             echo "Done Inserting Author <br/>";

            //insert junction Author Book
            foreach ($autorID as $key){
            
                $query = "INSERT INTO `junc_authorbook` (`id`, `book_id`, `aut_id`) VALUES (NULL, $book_id, $key)";
                // echo $query;
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $conn ->query($query);
                echo "Done setting constraint on AuthorBook <br/>";
            }

            ///------------END OF AUTHOR INSERTION-----------///


            ///------------START OF KEYWORDS INSERTION-------///

            

            $kw = array();
            foreach ($keywordsArray as $key ) {
                //echo "Keywords: " . $key;

                //valid keywords isf existed///
                $query = "SELECT id FROM `keywords` WHERE key_words='$key'";
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);
                if($result->num_rows>0){

                    //if found. get the keywords id and put into array. 
                    while($row = $result->fetch_assoc()){
                        array_push($kw, $row['id']);
                    }
                    //echo "keywords: " . $key . " Found! <br/>";
                }else{

                    // else not found then load to db and get the keywords i.d

                    //load to kewords table
                    $query = "INSERT INTO `keywords` (`id`, `key_words`) VALUES (NULL, '$key')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);

                    //if load to db then get id then push to aray
                    if($result){
                        $query = "SELECT id FROM `keywords` WHERE key_words='$key'";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);

                        while($row1 = $result->fetch_assoc()){
                            array_push($kw, $row1['id']);
                        }
                    }
   
                }
                //echo "Loaded <br/>";
            }
            echo "Done Inserting Keywords <br/>";

            //insert book and key on junction table
            foreach ($kw as $key) {
                        $query = "INSERT INTO `junc_bookkeywords` (`id`, `book_id`, `keywords_id`) VALUES (NULL, '13', '3')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);
                        
            }

            echo "Done setting constraint Book-Keywords <br/>";

            ///------------END OF Keywords INSERTION--------///


            ///--------------START OF REFERENCES INSERTION------------///

            $refID = array();
            foreach($referencesArray as $key){

                //check references if existed///
                $query = "SELECT id FROM `ref` WHERE link='$key'";
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);

                if($result->num_rows>0){
                     while($row = $result->fetch_assoc()){
                        array_push($refID, $row['id']);
                    }
                }else{
                     // else not found then load to db and get the reference i.d

                    //load to ref table
                    $query = "INSERT INTO `ref` (`id`, `link`) VALUES (NULL, '$key')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);

                    //if load to db then get id then push to aray
                    if($result){
                        $query = "SELECT id FROM `ref` WHERE link='$key'";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);

                        while($row1 = $result->fetch_assoc()){
                            array_push($refID, $row1['id']);
                        }
                    }

                }

            }

            //insert book and refernce on junction table
            foreach ($refID as $key) {
                        $query = "INSERT INTO `junk_bookref` (`id`, `book_id`, `webref_id`) VALUES (NULL, '$book_id', '$key')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $conn ->query($query);
                        
            }

            echo "Done setting constraint Book-References <br/>";



            


            ///-----------END OF REFERNCES INSERTION----------------////
            echo "All process done 100% <br/>";
            
            }

        ////--------------End of Book Insertion--------------------////


        

        

    
?>