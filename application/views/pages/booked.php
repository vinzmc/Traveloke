<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finished Transaction</title>
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
    <?php echo $style ?>
</head>

<body class="bg-light">
    <div class="box">
        <?php echo $navbar; ?>
        <div class="container content navmargin bg-white">
            <h2 class="mt-2">Finished Transaction</h2>
            <hr>
            <?php if (empty($db)) : ?>
                <div class="row align-items-center h-75">
                    <div class="col-6 mx-auto">
                        <div class='text-center'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                            </svg>
                            <h3 class="mt-4"> You don't have any transaction</h3>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php foreach ($db as $row) : ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <div class="">
                                    <small class="text-muted font-weight-bold">
                                        Transaction Number
                                    </small>
                                    <h4 class="card-title mb-2">
                                        #<?= $row['number'] ?>
                                    </h4>
                                </div>
                                <hr class="mb-2 mt-0" style="max-width:95%">
                                <div class="ml-2">
                                    <small class="text-muted font-weight-bold">
                                        Hotel Name
                                    </small>
                                    <h6 class="card-subtitle mb-2 pt-1"><?= $row['name'] ?></h6>
                                </div>
                                <div class="ml-2">
                                    <small class="text-muted font-weight-bold">
                                        Total Cost
                                    </small>
                                    <h6 class="card-subtitle mb-2 pt-1">Rp <?= number_format($row['total'], 0, ",", "."); ?></h6>
                                </div>
                                <div class="ml-2">
                                    <small class="text-muted font-weight-bold">
                                        Purchase Date
                                    </small>
                                    <h6 class="card-subtitle mb-2 pt-1"><?= $row['date'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $script ?>
</body>

</html>