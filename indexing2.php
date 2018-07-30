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