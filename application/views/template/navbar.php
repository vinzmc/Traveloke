<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <nav class="navbar fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url("index.php/Welcome/index") ?>">Traveloke</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Booking Cart</a>
                </li>
                <?php if ($this->session->userdata('nama')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/Login/logout'); ?>">Logout</a>
                    </li>
                <?php } else {?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("index.php/Login") ?>">Login</a>
                    </li>
                <?php } ?>
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About Us
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url("index.php/Welcome/kaleb") ?>">Kaleb Juliu</a>
                        <a class="dropdown-item" href="<?= base_url("index.php/Welcome/moris") ?>">Maurice Marvin</a>
                        <a class="dropdown-item" href="<?= base_url("index.php/Welcome/riki") ?>">Ricky Tandiono</a>
                        <a class="dropdown-item" href="<?= base_url("index.php/Welcome/sergio") ?>">Sergio Nathaniel</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
</body>

</html>