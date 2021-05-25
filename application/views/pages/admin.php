<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Administrator</title>
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
    <?php echo $style ?>
    <?= $tableCSS ?>
</head>

<body>
    <div class="box">
        <?php echo $navbar; ?>
        <div class="container-fluid content navmargin">
            <nav class="mt-1">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link font-weight-bold active" style="color: #5D5C61;" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="true">User DB</a>
                    <a class="nav-item nav-link font-weight-bold" style="color: #5D5C61;" id="nav-hotel-tab" data-toggle="tab" href="#nav-hotel" role="tab" aria-controls="nav-hotel" aria-selected="false">Hotel DB</a>
                    <a class="nav-item nav-link font-weight-bold" style="color: #5D5C61;" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- user -->
                <div class="tab-pane fade show active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                    <h5 class="text-center mt-3">User Database</h5>
                    <?php
                    if ($this->session->flashdata('error') != '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ';
                        echo $this->session->flashdata('error');
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('msg') != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Succeed!</strong> ';
                        echo $this->session->flashdata('msg');
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                    }
                    ?>
                    <!-- content -->
                    <div class="container-fluid">
                        <?= $user ?>
                    </div>
                    <!-- content limit -->
                </div>
                <!-- hotel -->
                <div class="tab-pane fade" id="nav-hotel" role="tabpanel" aria-labelledby="nav-hotel-tab">
                    <h5 class="text-center mt-3">Hotel Database</h5>
                </div>
                <!-- profile -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    c
                </div>
            </div>


        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $script ?>
    <?= $tableJS ?>
</body>

</html>