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
        <div class="container content navmargin bg-white pb-2 pt-5">
            <h2 class="mt-2">Booking Detail</h2>
            <hr>
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
            <form class="row" action="<?= base_url("cart/insert_item") ?>" method="POST">
                <!-- csrf -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <!-- hidden input -->
                <input type="hidden" name="id" value="<?= $db['hotel-id'] ?>">
                <div class="form-row">
                    <!-- full name -->
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="<?= $_SESSION['name'] ?>" required>
                    </div>
                    <!-- phone number -->
                    <div class="form-group col-md-6">
                        <div class="d-inline">
                            <label for="phone">Phone Number</label>
                            <small id="phoneHelpBlock" class="text-muted" style="font-size:x-small;">
                                (11 or 12 digits)
                            </small>
                        </div>
                        <input type="tel" class="form-control" name="phone" pattern="^\d{11,12}$" placeholder="081212345678" value="<?= $_SESSION['phone'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com" value="<?= $_SESSION['email'] ?>" required>
                </div>
                <!-- date -->
                <div class="form-row">
                    <!-- check in date -->
                    <div class="form-group col-md-6">
                        <label for="indate">Check-in Date</label>
                        <input type="date" class="form-control" name="inDate" id="inDate" min="<?= $date ?>" value="<?= $date ?>" required>
                    </div>
                    <!-- day +1 -->
                    <?php
                        $date = strtotime( $date);
                        $date = strtotime('+1 day', $date);
                        $date = date('Y-m-d', $date);
                    ?>
                    <!-- check out date -->
                    <div class="form-group col-md-6">
                        <label for="outdate">Check-out Date</label>
                        <input type="date" class="form-control" name="outDate" min="<?= $date ?>" value="<?= $date ?>" required>
                    </div>
                </div>
                <!-- qty -->
                <div class="form-group">
                    <label for="room">Number of Room</label>
                    <input type="number" class="form-control" name="room" id="room" min="1" max="<?=$db['hotel-stock']?>" value="1" required>
                </div>

                <!-- room price per night for js -->
                <span id="roomPrice" class="invisible"><?= $db['hotel-price'] ?></span>
                <!-- Total Transaciton -->
                <div class="row mt-2">
                    <div class="col-sm-5 mb-2">
                        <ul class="list-group">
                            <li class="list-group-item bg-dark text-white font-weight-bold text-center" style="font-size:large">Nightly Cost</li>
                            <li class="list-group-item">
                                <div class="row h-100">
                                    <div class="col">Room Price</div>
                                    <div class="col text-right">
                                        Rp <span><?= number_format($db['hotel-price'], 0, ",", "."); ?></span>/night
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row h-100">
                                    <div class="col">Total Room</div>
                                    <div class="col text-right">
                                        <span id="requestedRoom">1 Room</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-light">
                                <div class="row h-100">
                                    <div class="col font-weight-bold text-middle"><span style=" font-size:large;">Cost per Night</span></div>
                                    <div class="col text-right">
                                        <hr class="mt-0 pt-0 mb-1 pb-0">
                                        Rp <span id="grandTotal">##.###</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm">
                        <a href="<?= base_url(); ?>" class="btn btn-danger text-white float-right ml-2"> Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Add Booking</button>
                    </div>
                </div>
            </form>
        </div>
        <?php echo $footer; ?>
    </div>
    <?php echo $script ?>
    <script>
        $(document).ready(function() {
            //money format
            function addCommas(nStr) {
                nStr += '';
                var x = nStr.split(',');
                var x1 = x[0];
                var x2 = x.length > 1 ? ',' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + '.' + '$2');
                }
                return x1 + x2;
            }
            //init
            var room = $('#room').val();
            var price = $('#roomPrice').text();
            var total = addCommas(room * price);
            $('#grandTotal').text(total);

            //input room change
            $("#room").on("input", function() {
                room = $(this).val();
                total = addCommas(room * price);
                $('#requestedRoom').text(room);
                $('#grandTotal').text(total);
            });
        });
    </script>
</body>

</html>