<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/b.css">
</head>
<body>
    <div class="main">
        <?php
        require "add.class.php";
        $message=new Message();
        $row = $message->getAll();
        ?>
    </div>
</body>
</html>
