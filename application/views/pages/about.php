<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="<?=base_url()?>/favicon.svg" type="image/gif">
</head>

<body>

    <div class="box">
        <?php echo $navbar ?>
        <section class="our-webcoderskull padding-lg content navmargin">
            <div class="container" style="margin-top: 25px;">
                <ul class="row align-middle">
                    <div class="heading heading-icon">
                        <h2>About Us</h2>
                    </div>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight rcorner" style="height: 349px;">
                            <figure><img src="<?= base_url("assets/images/kaleb.png") ?>" class="img-responsive" alt=""></figure>
                            <h3>Kaleb Juliu</h3>
                            <h7>00000033577</h7>
                            <p>Back End Developer</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.instagram.com/kaleb_juliu/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight rcorner" style="height: 349px;">
                            <figure><img src="<?= base_url("assets/images/maurice.png") ?>" class="img-responsive" alt=""></figure>
                            <h3>Maurice Marvin</h3>
                            <h7>00000033942</h7>
                            <p>Back End Developer</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.instagram.com/vinzmcs/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight rcorner" style="height: 349px;">
                            <figure><img src="<?= base_url("assets/images/riki.png") ?>" class="img-responsive" alt=""></figure>
                            <h3>Ricky Tandiono</h3>
                            <h7>00000034209</h7>
                            <p>Front End Developer</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.instagram.com/tandionoricky/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight rcorner" style="height: 349px;">
                            <figure><img src="<?= base_url("assets/images/sergio.png") ?>" class="img-responsive" alt=""></figure>
                            <h3>Sergio Nathaniel</h3>
                            <h7>00000033898</h7>
                            <p>Front End Developer</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.instagram.com/sergioo890/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <?php echo $footer ?>
    </div>

    <?php echo $style ?>
    <?php echo $script ?>
</body>

</html>