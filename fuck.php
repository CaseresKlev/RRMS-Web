<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<script type="text/javascript">

function addElement() {
    var  input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'cat[]');
    input.setAttribute('value', 'some value');
    document.getElementById('cate').appendChild(input);

    // We need to return false so the href isn't followed.
    return false;
}

</script>

<form action="submit.php" method='POST' enctype="multipart/form-data">
<div id="cate" style="width: 100px">
    <input type="text" name="cat[]" value="kjkj">
</div>
</form>

<a href="#" onclick="return addElement()">Add Another</a>
</body>
</html>