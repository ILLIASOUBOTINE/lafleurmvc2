<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/imgs/general/favicon.ico" type="image/x-icon">
    <link rel="icon" href="public/imgs/general/favicon.ico" type="image/x-icon">
    <title><?=$title?></title>
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
    <div class="wrapper">
        <?php
            include 'components/header.php';
        ?>
        <main>
            <?php
                echo $content;
            ?>
        </main>
        <?php
           include 'components/footer.php';
        ?>
    </div>
    <script src="public/main.js"></script>
    <script src="public/loto.js"></script>
</body>

</html>