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
                    <form action="<?= base_url() ?>" method="POST">
                        <select name="star" class="form-select" aria-label="Default select example" style="width: 150px;">
                            <option value="">All Star</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                        </select>
                    </form>
                </div>

                <div class="col-4">
                    <form action="<?= base_url() ?>" method="POST">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="keyword" required placeholder="Search Hotel Name, Location ...">
                            <div class="input-group-append">
                                <button class="button btn btn-secondary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
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