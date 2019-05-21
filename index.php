<?php
    $nodirect = true;
    include 'init.php';

    include 'controller.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gravis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $cfg['path']['css']; ?>app.css">
    <script src="<?php echo $cfg['path']['js']; ?>jquery-3.4.0.min.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="<?php echo $cfg['path']['img']; ?>logo.png" alt="Logo"></a>
        </div><!--
        --><div class="menu">
            <ol>
            <?php
                view_menu();
            ?>
            </ol>
        </div>
    </div>
    <div class="content">
        <?php
            view_content();
        ?>
    </div>
    <div class="footer">
        Team Member of Gravis &copy; 2017
    </div>
</body>
<script src="<?php echo $cfg['path']['js']; ?>app.js"></script>
</html>