<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <!-- <link rel="stylesheet" href="public/css/main.css"> -->
    <link rel="stylesheet" href="public/css/style.css">
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
</body>


</html>