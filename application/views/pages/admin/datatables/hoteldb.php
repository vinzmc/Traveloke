<table id="hotel" class="display" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hotel Name</th>
            <th>Hotel Location</th>
            <th>Price per Night</th>
            <th>Available Room</th>
            <th>Stars</th>
            <th>Hotel Picture</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hoteldb as $row) { ?>
            <tr>
                <?= form_open('admin/update_hotel'); ?>
                <!-- csrf token -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <!-- id -->
                <td><?= $row['hotel-id'] ?></td>
                <input type="hidden" name="hotel-id" value="<?= $row['hotel-id'] ?>">
                <!-- hotel-name -->
                <td>
                    <div hidden>
                        <?= $row['hotel-name'] ?>
                    </div>
                    <input class="form-control" type="text" name="hotel-name" value="<?= $row['hotel-name'] ?>" required></input>
                </td>
                <!-- hotel-address -->
                <td>
                    <div hidden>
                        <?= $row['hotel-address'] ?>
                    </div>
                    <input class="form-control" type="text" name="hotel-address" value="<?= $row['hotel-address'] ?>" required></input>
                </td>
                <!-- hotel-price -->
                <td>
                    <div hidden>
                        <?= $row['hotel-price'] ?>
                    </div>
                    <input class="form-control" type="number" name="hotel-price" value="<?= $row['hotel-price'] ?>" min='50000' max="100000000" required></input>
                </td>
                <!-- hotel-stock -->
                <td>
                    <div hidden>
                        <?= $row['hotel-stock'] ?>
                    </div>
                    <input class="form-control" type="number" name="hotel-stock" value="<?= $row['hotel-stock'] ?>" min="0" max="10000" required></input>
                </td>
                <!-- Star -->
                <td>
                    <div hidden>
                        <?= $row['star'] ?>
                    </div>
                    <input class="form-control" type="number" name="star" value="<?= $row['star'] ?>" min="1" max="5" required></input>
                </td>
                <!-- file -->
                <td>
                    <a class="btn btn-info mb-1 mt-1" href="<?= base_url('admin/updateHotelPic/' . $row['hotel-id']) ?>"> Edit</a>
                    
                    <?= str_replace("assets/images/", "", $row['hotel-photo']); ?>
                </td>
                <!-- option -->
                <td>
                    <input class="btn btn-warning mb-1 mt-1" type="submit" value="Update"></input>
                    <a class="btn btn-danger mb-1 mt-1" href="<?= base_url('admin/delete_hotel/' . $row['hotel-id']) ?>" onclick="return confirm('Are you sure you want to delete <?= $row['hotel-name'] ?> info?');"> Delete</a>
                </td>
                <?php echo form_close(); ?>
            </tr>
        <?php } ?>
    </tbody>
    <!-- new hotel -->
    <tr>
        <?= form_open_multipart('admin/new_hotel'); ?>
        <!-- csrf token -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <td>#</td>
        <td>
            <input class="form-control" type="text" name="hotel-name" placeholder="Hotel Name" required></input>
            <?php echo form_error('name'); ?>
        </td>
        <td>
            <input class="form-control" type="text" name="hotel-address" placeholder="Location(City)" required></input>
            <?php echo form_error('hotel-address'); ?>
        </td>
        <td>
            <input class="form-control" type="number" name="hotel-price" placeholder="Rent Price" min='50000' max="100000000" required></input>
            <?php echo form_error('hotel-price'); ?>
        </td>
        <td>
            <input class="form-control" type="number" name="hotel-stock" placeholder="Available Room"  min="0" max="10000" required></input>
            <?php echo form_error('hotel-stock'); ?>
        </td>
        <td>
            <input class="form-control" type="number" name="star" placeholder="Stars" min="1" max="5" required></input>
            <?php echo form_error('role_id'); ?>
        </td>
        <td style="min-width:15em; max-width:16.5em">
            <input class="form-control" type="file" name="userfile"></input>
        </td>
        <td>
            <input type="submit" class="btn btn-success" value="New Hotel"></input>
        </td>
        </form>
    </tr>
</table>