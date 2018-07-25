<!DOCTYPE html>
<html style="width=70%">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/add-research.css" />
    <script src="js/add-research.js"></script>
    <script>
        window.onload = init();
    </script>
</head>
<body>

    <div id="enclosure" class="div-book">
        <?php include 'getBook.php'; ?>
    </div>
    <div id="enclosure" class="div-author">
        <?php include 'getAuthor.php'; ?>
    </div>
    <div id="enclosure" class="div-adviser">
        <?php include 'getAdviser.php'; ?>
    </div>

<p id="page">Pages</p>
</body>
</html>