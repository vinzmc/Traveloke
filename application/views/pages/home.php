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
                <div class="col-7 ml-3">
                    <div id="accordion" class="pb-2" style="position:fixed; z-index:1">
                        <div class="card">
                            <button class="btn btn-secondary text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="card-header" style="border-width: 0; padding:0px;" id="headingOne">
                                    <h6 class="mb-0" style="border-width: 0;">
                                        Filter
                                    </h6>
                                </div>
                            </button>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="<?= base_url(); ?>" method="POST">
                                        <!-- csrv -->
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <!-- hidden input -->
                                        <input type="hidden" name="keyword" value="<?php if(isset($_POST['keyword'])){echo $_POST['keyword'];}?>">
                                        <!-- hotel star -->
                                        <p class="pb-0 mb-0 font-weight-bold">Minimum Star</p>
                                        <div class="border rounded pt-0 p-1">
                                            <small>
                                                <div class="form-check">
                                                
                                                    <input class="form-check-input" type="radio" name="star" id="exampleRadios1" value="1" <?php if(isset($_POST['star']) && $_POST['star']==1){echo 'checked';}?>>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        ALL
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="star" id="exampleRadios2" value="2" <?php if(isset($_POST['star']) && $_POST['star']==2){echo 'checked';}?>>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        <?php for ($i = 0; $i < 2; $i++) : ?>
                                                            <svg style="color: yellow;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        <?php endfor; ?>
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="star" id="exampleRadios3" value="3" <?php if(isset($_POST['star']) && $_POST['star']==3){echo 'checked';}?>>
                                                    <label class="form-check-label" for="exampleRadios3">
                                                        <?php for ($i = 0; $i < 3; $i++) : ?>
                                                            <svg style="color: yellow;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        <?php endfor; ?>
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="star" id="exampleRadios3" value="4" <?php if(isset($_POST['star']) && $_POST['star']==4){echo 'checked';}?>>
                                                    <label class="form-check-label" for="exampleRadios3">
                                                        <?php for ($i = 0; $i < 4; $i++) : ?>
                                                            <svg style="color: yellow;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        <?php endfor; ?>
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="star" id="exampleRadios3" value="5" <?php if(isset($_POST['star']) && $_POST['star']==5){echo 'checked';}?>>
                                                    <label class="form-check-label" for="exampleRadios3">
                                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                                            <svg style="color: yellow;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        <?php endfor; ?>
                                                    </label>
                                                </div>
                                            </small>
                                        </div>
                                        <!-- Price Filter -->
                                        <p class="pt-1 mt-1 pb-0 mb-0 font-weight-bold">Price Range</p>
                                        <div class="border rounded pl-2 pr-3 pb-1 pt-2">
                                            <div class="form-group mb-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp</div>
                                                    </div>
                                                    <input type="number" class="form-control" name="min" id="inlineFormInputGroup" placeholder="Minimum Price" value="<?php if(isset($_POST['min'])){echo $_POST['min'];}?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp</div>
                                                    </div>
                                                    <input type="number" class="form-control" name="max" id="inlineFormInputGroup" placeholder="Maximum Price" value="<?php if(isset($_POST['min'])){echo $_POST['max'];}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success mt-2 mb-2 d-flex float-right" value="Filter">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <!-- search form -->
                    <form action="<?= base_url() ?>" method="POST">
                        <!-- csrf -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <!-- hidden input -->
                        <input type="hidden" name="min" value="<?php if(isset($_POST['min'])){echo $_POST['min'];}?>">
                        <input type="hidden" name="max" value="<?php if(isset($_POST['max'])){echo $_POST['max'];}?>">
                        <input type="hidden" name="star" value="<?php if(isset($_POST['star'])){echo $_POST['star'];}?>">
                        <div class="input-group input-group-sm mb-3">
                            <!-- keyword -->
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="keyword" required placeholder="Search Hotel Name, Location ..." value="<?php if(isset($_POST['keyword'])){echo $_POST['keyword'];}?>">
                            <div class="input-group-append">
                                <!-- btn search -->
                                <button class="button btn btn-secondary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                                <!-- btn reset -->
                                <?php if (isset($_POST['keyword'])) : ?>
                                    <a href="<?= base_url() ?>" class="button btn btn-danger text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                        </svg>
                                        Reset
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
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