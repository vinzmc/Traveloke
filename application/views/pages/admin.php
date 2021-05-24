<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <?php echo $style ?>
    <?= $tableCSS ?>
</head>

<body>
    <div class="box" style="background-color: #EDF9FF;">
        <?php echo $navbar; ?>
        <div class="container-fluid content navmargin" style="background-color: white;">
            <div class="row h-100 no-gutters mt-1">
                <div class="align-self-center col-lg-2 border border-secondary w-100 " style=" font-weight:500; border-radius:10px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User DB</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Hotel DB</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Profile</a>
                    </div>
                </div>
                <div class="col ml-2 mb-2 border border-secondary" style="border-radius:10px">
                    <h6 class="text-center mt-1" id="title">Table</h6>
                    <!-- content -->
                    <div class="container-fluid">
                        <?= $table ?>
                    </div>
                    <!-- content limit -->
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $script ?>
    <?= $tableJS ?>
</body>

</html>