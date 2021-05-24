<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <div class="box">
        <?php echo $navbar; ?>
        <div class="container content navmargin">
            <?php
            if (isset($uploadlog) && !is_array($uploadlog)) {
                echo "<h4> ";
                echo ($uploadlog);
                echo " </h4>";
            }
            ?>
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign Up</h5>
                            <?php
                            if ($this->session->flashdata('error') != '') {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $this->session->flashdata('error');
                                echo '</div>';
                            }
                            ?>
                            <?php echo form_open_multipart('register'); ?>
                            <!-- csrf token -->
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name">Name</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control">
                                <label for="email">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="password">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="repassword" name="repassword" class="form-control">
                                <label for="repassword">Re-Type Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="date" id="date" name="date" class="form-control">
                                <label for="date">Birth Date</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="phone" name="phone" class="form-control">
                                <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-label-group">
                                <input type="file" id="userfile" name="userfile" class="form-control" size="2000" accept="image/*">
                                <?= form_error('userfile'); ?>
                                <label for="img">Photo</label>
                            </div>
                            
                            <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Sign Up"></input>
                            <?php echo form_close(); ?>
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