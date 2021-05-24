<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="<?=base_url()?>/favicon.svg" type="image/gif">
</head>

<body>
    <div class="box ">
    <?php echo $navbar; ?>
        <div class="content navmargin">
            <div class="container">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <?php if (isset($_SESSION['pesan'])) { ?>
                                <span class="m-2">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['pesan'] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </span>
                            <?php } ?>
                            <?php if (isset($_SESSION['pesan'])) {
                                unset($_SESSION['pesan']);
                            } ?>

                            <form class="form-signin" method="post" action="<?= base_url("login/login_validation"); ?>">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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

                                <div class="form-group d-flex justify-content-center">
                                    <label for="captcha" class="control-label"></label>
                                    <div class="g-recaptcha" data-sitekey="6Lfn7NkaAAAAAFwot0o9fYiwrRc2kt7r90dvwLNI" required></div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                                <hr class="my-4">
                                <a>Dont Have Account ? </a><a href="<?= base_url("register") ?>">Create Here !</a><br></br>
                            </form>
                        </div>
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