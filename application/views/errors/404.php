<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
</head>

<body>
    <?php echo $navbar; ?>

    <div class="box">
        <?php echo $navbar; ?>
        <div class="container content navmargin">
            <div class="row align-items-center h-100">
                <div class="text-center">
                    <a href="<?= base_url();?>">
                        <img src="https://media.tenor.com/images/39f3d91c4b7052af998318a0324a33b8/tenor.gif" style="width:220px; height:220px" alt="Duck of Guidance">
                    </a>
                    <h1 class="mb-0 text-secondary">404</h1>
                    <h2 class="mt-0 text-secondary"> NOT FOUND </h2>
                    <h5 class="mb-0 mt-4 text-info"> Page you're looking for is not exists!</h5>
                    <small class="mt-0 text-secondary">Follow The duck</small>
                </div>

            </div>
        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $style; ?>
    <?php echo $script; ?>
</body>

</html>