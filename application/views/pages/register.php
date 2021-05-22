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
                            <form class="form-signin" action="<?php echo base_url(); ?>Regist/process">
                                <div class="form-label-group">
                                    <input type="text" id="name" class="form-control">
                                    <label for="name">Name</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="email" id="email" class="form-control">
                                    <label for="email">Email</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password" class="form-control">
                                    <label for="password">Password</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="repassword" class="form-control">
                                    <label for="repassword">Re-Type Password</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="date" id="date" class="form-control">
                                    <label for="date">Birth Date</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="phone" class="form-control">
                                    <label for="phone">Phone Number</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="file" id="img" class="form-control" size="20">
                                    <label for="img">Photo</label>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
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