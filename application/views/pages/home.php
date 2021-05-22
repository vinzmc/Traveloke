<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <div class="box">
        <?php echo $navbar; ?>
        <div class="content" style="padding: 100px;">
            <?php echo $view; ?>
        </div>
        <?php echo $footer; ?>
    </div>

    <?php echo $style; ?>
    <?php echo $script; ?>
</body>

</html>