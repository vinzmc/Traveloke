<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture Change</title>
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
    <?php echo $style; ?>
</head>

<body>
    <div class="box" style="background-color: #EDF9FF;">
        <?php echo $navbar; ?>
        <div class="container content navmargin bg-light">
            <div class="row mt-5 h-100 rounded border m-5 bg-white">
                <div class="col-sm mr-0 pr-0">
                    <div class="container">
                        <img src="<?= base_url($db['picture']); ?>" class="rounded mx-auto d-block mt-3" alt="...">
                        <h2 class="text-center"><?= str_replace('assets/images/', '', $db['picture']); ?></h2>
                        <div class="row">
                            <div class="col-lg-4 col"></div>
                            <div class="col-lg-2 col">
                                <?= form_open_multipart('admin/picture_reupload'); ?>
                                <!-- csrv -->
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <!-- file -->
                                <input class="form-control w-auto" type="file" name="userfile"></input>
                                <input type="submit" class="btn btn-success mt-1" value="Change Picture"></input>
                                </form>
                            </div>
                            <div class="col-lg-auto col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $script; ?>
</body>

</html>