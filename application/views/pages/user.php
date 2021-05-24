<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="<?=base_url()?>/favicon.svg" type="image/gif">
</head>

<body>
    <div class="box" style="background-color: #EDF9FF;">
        <?php echo $navbar; ?>
        <div class="container content navmargin w-75" style="background-color: white;">
            <!-- Header -->
            <div class="row">
                <h3 class="mt-3 ml-3 pl-4">Personal Information</h3>
            </div>
            <!-- data container -->
            <div class="row p-3 ml-3 mr-3 mb-4 border" style="border-radius: 20px;">
                <!-- img -->
                <div class="col-2">
                    <div class="row pl-2 pb-1">
                        <div class="center-cropped" style="background-image: url('<?= base_url($_SESSION['picture']); ?>'); border-radius:15px">
                            <img src="<?= base_url($_SESSION['picture']); ?>">
                        </div>
                    </div>
                </div>
                <!-- data -->
                <div class="col-7 ml-2 mr-auto">
                    <!-- Nama -->
                    <div class="row">
                        <div class="col-7 p-1 pl-0">
                            <h5>Name</h5> <!-- title -->
                        </div>
                        <div class="col-5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 pl-1 ml-1">
                            <p><?= $_SESSION['name']?></p>
                        </div>
                    </div>
                    <!-- Telp -->
                    <div class="row">
                        <div class="col-7 p-1 pl-0">
                            <h5>Phone Number</h5> <!-- title -->
                        </div>
                        <div class="col-5 p-1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 pl-1 ml-1">
                            <p><?= $_SESSION['phone']?></p>
                        </div>
                    </div>
                </div>
                <!-- edit button personal -->
                <div class="col-2">
                    <div class="row pl-2 pt-1">
                        <a class="btn btn-secondary btn-sm" href="<?= base_url('user/personalize'); ?>" role="button" style="width: 145px;">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header 2 -->
            <div class="row">
                <h3 class="ml-3 pl-4">Account Security</h3>
            </div>
            <!-- data container -->
            <div class="row p-3 ml-3 mr-3 mb-5 border" style="border-radius: 20px;">
                <div class="col-10">
                    <!-- Email -->
                    <div class="row">
                        <div class="col-7 p-1 pl-0">
                            <h5>Email</h5> <!-- title -->
                        </div>
                        <div class="col-5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 pl-1 ml-1">
                            <p><?= $_SESSION['email']?></p>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="row">
                        <div class="col-7 p-1 pl-0">
                            <h5>Password</h5> <!-- title -->
                        </div>
                        <div class="col-5 p-1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 pl-1 ml-1">
                            <p><?= '******'?></p>
                        </div>
                    </div>
                </div>
                <!-- edit button security -->
                <div class="col-2">
                    <div class="row pl-2 pt-1">
                        <a class="btn btn-secondary btn-sm" href="<?= base_url('user/security'); ?>" role="button" style="width: 145px;">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $style; ?>
    <?php echo $script; ?>
</body>

</html>