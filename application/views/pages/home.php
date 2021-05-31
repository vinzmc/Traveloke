<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveloke</title>
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
</head>

<body>

    <div class="box">
        <?php echo $navbar; ?>
        <div class="container content navmargin" style="padding: 20px;">
            <div class="row">
                <div class="col-7">
                    <form action="<?= base_url(); ?>" method="POST">
                        <!-- csrv -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <select name="star" class="form-select" aria-label="Default select example" style="width: 150px;">
                            <option value="">All Star</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                        </select>
                        <input type="submit" class="btn btn-success" value="Filter">
                    </form>

                </div>

                <div class="col-4">
                    <!-- search form -->
                    <form action="<?= base_url() ?>" method="POST">
                        <!-- csrf -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="input-group input-group-sm mb-3">
                            <!-- keyword -->
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="keyword" required placeholder="Search Hotel Name, Location ...">
                            <div class="input-group-append">
                                <!-- btn search -->
                                <button class="button btn btn-secondary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                                <!-- btn reset -->
                                <?php if(isset($_POST['keyword'])): ?>
                                <a href="<?=base_url()?>" class="button btn btn-danger text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                    </svg>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-1">
                    <form action="<?= base_url() ?>" method="POST">
                        <select class="form-select" aria-label="Default select example" style="width: 150px;">
                            <option selected>Price</option>
                            <option value="1">0 - Rp 500.000</option>
                            <option value="2">Rp 500.001 - Rp 1.000.000 </option>
                            <option value="3">Rp 1.000.001 - Rp 1.500.000</option>
                            <option value="4">Rp 1.500.001 - Rp 2.000.000</option>
                            <option value="5">Rp 2.000.001+</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php echo $view; ?>
            </div>
        </div>
        <?php echo $footer; ?>
    </div>

    <?php echo $style; ?>
    <?php echo $script; ?>
</body>

</html>