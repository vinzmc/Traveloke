<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-dark" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url("index.php/welcome") ?>" style="font-weight: 625;">Traveloke</a>

            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item" style="font-weight: 500;">

                    <?php if (isset($_SESSION['name'])) { ?>
                        <a class="nav-link" href="<?= base_url("index.php/user"); ?>">
                            <?= $_SESSION['name']; ?>
                        <?php } else { ?>
                            <a class="nav-link" href="<?= base_url("index.php/login"); ?>">
                            <?= "Guest";
                        } ?>
                            </a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Booking Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/welcome/about'); ?>">About Us</a>
                    </li>
                    <?php if (isset($_SESSION['name'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('index.php/login/logout'); ?>">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("index.php/login") ?>">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>