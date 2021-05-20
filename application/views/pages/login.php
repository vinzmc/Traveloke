<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <?php echo $navbar; ?>

    <br></br><br></br>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <span class="m-2"><?= $this->session->flashdata('pesan'); ?></span>
                        <form class="form-signin" method="post" action="<?= base_url("index.php/login/login_validation"); ?>">
                            <div class="form-label-group">
                                <input name="email" type="email" id="email" class="form-control" placeholder="Email address" required autofocus>
                                <label for="email">Email address</label>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-label-group">
                                <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
                                <label for="password">Password</label>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="captcha" class="control-label"></label>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6Lfn7NkaAAAAAFwot0o9fYiwrRc2kt7r90dvwLNI" required></div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                            <?php
                            echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                            ?>
                            <hr class="my-4">
                            <a>Dont Have Account ? </a><a href="<?= base_url("index.php/Regist/index") ?>">Create Here !</a><br></br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $footer; ?>
    <?php echo $style; ?>
    <?php echo $script; ?>
</body>

</html>