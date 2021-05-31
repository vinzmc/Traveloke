<?php foreach ($data as $row) : ?>
    <div class="col-sm-auto mb-4">
        <div class="card" style="width: 20rem;">
            <img src="<?= base_url("assets/images/" . $row['hotel-photo']) ?>" class="card-img-top">
            <div class="card-body">
                <small class="card-text"><?= $row['hotel-address'] ?></small>
                <h5 class="card-title mb-0 pb-0"><?= $row['hotel-name'] ?></h5>
                <?php
                for ($i = 0; $i < $row['star']; $i++) { ?>
                    <svg style="color: yellow;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                <?php } ?>

                <p class="card-text mt-3  mb-0 pb-0">Rp <?= number_format($row['hotel-price'], 0, ",", "."); ?></p>

                <!-- room state -->
                <?php
                if ($row['hotel-stock'] == 0) {
                    $room_state = "disabled";
                } else {
                    $room_state = "";
                }
                ?>
                <!-- button book now -->
                <form action="
                    <?php if (isset($_SESSION['name'])) {
                        echo base_url("cart/insert_item");
                    } else {
                        echo base_url("login");
                    } ?>
                    " method="POST">
                    <!-- csrf -->
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <!-- hidden input -->
                    <input type="hidden" name="id" value="<?= $row['hotel-id'] ?>">
                    <input type="submit" class="btn btn-primary" value="Book Now" <?= $room_state ?>></input>
                </form>
                <!-- available room status -->
                <small class="card-text mt-2 mb-0 pb-0 float-right">
                    <?php
                    if ($row['hotel-stock'] > 50) {
                        echo "Room available";
                    } else if ($row['hotel-stock'] < 50 && $row['hotel-stock'] > 0) {
                        echo "Almost Empty";
                    } else {
                        echo "Fully Booked";
                    }
                    ?>
                </small>
            </div>
        </div>
    </div>
<?php endforeach; ?>