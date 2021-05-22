<div class="container">
    <div class="row">
        <?php foreach ($data as $row) : ?>
            <div class="col-sm-auto mb-4">
                <div class="card" style="width: 20rem;">
                    <img src="<?= base_url("assets/images/" . $row['hotel-photo']) ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['hotel-name'] ?></h5>
                        <p class="card-text"><?= $row['hotel-address'] ?></p>
                        <p class="card-text">Stock Available : <?= $row['hotel-stock'] ?></p>
                        <p class="card-text">Rp : <?= $row['hotel-price'] ?></p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>