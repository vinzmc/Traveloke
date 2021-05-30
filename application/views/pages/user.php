<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
</head>

<body>
    <div class="box" style="background-color: #EDF9FF;">
        <?php echo $navbar; ?>
        <div class="container content navmargin w-75" style="background-color: white;">

            <!-- Header -->
            <div class="row">
                <?php
                if ($this->session->flashdata('error') != '') {
                    echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Error!</strong> ';
                    echo $this->session->flashdata('error');
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                }
                ?>
                <?php
                if ($this->session->flashdata('success') != '') {
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Success!</strong> ';
                    echo $this->session->flashdata('success');
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                }
                ?>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mt-3 ml-3 pl-4">Personal Information</h3>
                    </div>
                    <div class="mt-3 pt-1 mr-3 pr-3">
                    </div>
                </div>
            </div>
            <!-- data container -->
            <?php echo form_open_multipart('user/update'); ?>
            <!-- csrf -->
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <!-- hidden input -->
            <input type="hidden" name="dir" value="<?= str_replace("assets/images/", "", $_SESSION['picture'])?>"></input>
            <!-- left section -->
            <div class="row p-3 ml-3 mr-3 mb-4 border" style="border-radius: 20px;">
                <!-- data -->
                <div class="col">
                    <div class="mx-auto d-block">
                        <!-- name and phone -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?= $_SESSION['name']; ?>" <?= $_SESSION['stats']; ?> required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="08..." value="<?= $_SESSION['phone']; ?>" <?= $_SESSION['stats']; ?> required>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email@domain.com" value="<?= $_SESSION['email']; ?>" <?= $_SESSION['stats']; ?> required>
                        </div>
                        <!-- password -->
                        <div <?= $_SESSION['show']; ?>>
                            <!-- new password -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="npass">New Password</label>
                                    <input type="password" class="form-control" name="npass" id="npass" placeholder="New Password" <?= $_SESSION['stats']; ?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passv">New Password Verification</label>
                                    <input type="password" class="form-control" name="passv" id="passv" placeholder="Re-Type Password" <?= $_SESSION['stats']; ?>>
                                </div>
                            </div>
                            <!-- password confirmation -->
                            <div class="form-group">
                                <label for="oldpass">Old Password</label>
                                <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Old Password" <?= $_SESSION['stats']; ?> required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right section -->
                <div class="col-sm-3">
                    <!-- img -->
                    <div class="row pb-1">
                        <div class="center-cropped mx-auto d-block" style="background-image: url('<?= base_url($_SESSION['picture']); ?>'); border-radius:15px">
                            <img src="<?= base_url($_SESSION['picture']); ?>">
                        </div>
                    </div>
                    <!-- file input -->
                    <div class="row custom-file mx-auto mt-1 pt-1 <?= $_SESSION['btnA']; ?>">
                        <input type="file" class="custom-file-input" name="userfile" id="userfile">
                        <label class="custom-file-label" for="userfile">New Profile Picture</label>
                    </div>
                    <!-- Option btn -->
                    <div class="row mx-auto mt-4 <?= $_SESSION['btnA']; ?>">
                        <!-- submit btn -->
                        <input type="submit" class="btn btn-success font-weight-bold" value="Save"></input>
                        <!-- cancel btn -->
                        <a href="<?= base_url('user') ?>" class="btn btn-danger font-weight-bold text-white mt-1">Cancel</a>
                        </form>
                    </div>
                    <div class="row mx-auto mt-4 <?= $_SESSION['btnB']; ?>">
                        <!-- edit btn -->
                        <a href="<?= base_url('user/show') ?>" class="btn btn-info font-weight-bold">Edit</a>
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