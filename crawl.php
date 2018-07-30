<!DOCTYPE html>
<html style="width=70%">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/carwl.css" />


    
</head>
<body>

	<div id ="entryFile">
		<form id="upload" action="" class="group" onclick="" enctype="multipart/form-data" method="POST">
        <div class="browse">
                <p>
                    <label for="myFile">Choose Word File</label>
                    <input type="file" class="input" id="myFile" name="file" accept="Documents/docx">
                </p>
            </div>
            <div class="browse">
                <p>
                    <label for="myCover">Choose Cover</label>
                    <input type="file" class="input" id="myCover" name="cover" accept="image/*">
                </p>
            </div>
            <button type="button" name="submit" id="submit">Submit</button>
        </form>

	</div>
	<div id="taHolder">
		<textarea id="words" rows="15" cols="102">
			
		</textarea>
	</div>
	<div id="debug">
		<div id="textDebug">
			Indexing hellow
		</div>
		<div id="progress">
			85%
		</div>
	</div>
	<script src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/crawl.js"></script>

</body>

</html>