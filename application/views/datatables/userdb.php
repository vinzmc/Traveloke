<table id="example" class="display" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Created</th>
            <th>Phone Number</th>
            <th>Account Type</th>
            <th>Profile Picture</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dbdata as $row) { ?>
            <tr>
                <?= form_open('admin/update_user/' . $row['user_id'] . '/' . $row['role_id']); ?>
                <!-- csrf token -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <!-- id -->
                <td><?= $row['user_id'] ?></td>
                <!-- name -->
                <td>
                    <div hidden>
                        <?= $row['name'] ?>
                    </div>
                    <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>" required <?php if ($row['role_id'] == 2) {
                                                                                                                    echo 'disabled';
                                                                                                                } ?>></input>
                </td>
                <!-- email -->
                <td>
                    <div hidden>
                        <?= $row['email'] ?>
                    </div>
                    <input class="form-control" type="email" name="email" value="<?= $row['email'] ?>" required <?php if ($row['role_id'] == 2) {
                                                                                                                    echo 'disabled';
                                                                                                                } ?>></input>
                </td>
                <!-- date -->
                <td>
                    <div hidden>
                        <?= $row['date'] ?>
                    </div>
                    <input class="form-control" type="date" name="date" value="<?= $row['date'] ?>" required <?php if ($row['role_id'] == 2) {
                                                                                                                    echo 'disabled';
                                                                                                                } ?>></input>
                </td>
                <!-- phone -->
                <td>
                    <div hidden>
                        <?= $row['phone'] ?>
                    </div>
                    <input class="form-control" type="text" name="phone" value="<?= $row['phone'] ?>" required <?php if ($row['role_id'] == 2) {
                                                                                                                    echo 'disabled';
                                                                                                                } ?>></input>
                </td>
                <!-- role -->
                <td>
                    <div hidden>
                        <?php if ($row['role_id'] == 1) {
                            echo 'User';
                        } else echo 'Admin'; ?>
                    </div>
                    <select class="form-control" name="role_id" <?php if ($row['role_id'] == 2) {
                                                                    echo 'disabled';
                                                                } ?>>
                        <option value="1" <?php if ($row['role_id'] == 1) {
                                                echo 'selected="selected"';
                                            } ?>>User</option>
                        <option value="2" <?php if ($row['role_id'] == 2) {
                                                echo 'selected="selected"';
                                            } ?>>Admin</option>
                    </select>
                </td>
                <!-- file -->
                <td>
                    <a class="btn btn-info mb-1 mt-1 <?php if ($row['role_id'] == 2) {
                                                            echo 'disabled';
                                                        } ?>" href="<?= base_url('admin/update_picture/' . $row['user_id'] . '/' . $row['role_id']) ?>"> Edit</a>
                    <?= str_replace("assets/images/", "", $row['picture']); ?>
                </td>
                <!-- option -->
                <td>
                    <a class="btn btn-secondary mb-1 mt-1 <?php if ($row['role_id'] == 2) {
                                                                echo 'disabled';
                                                            } ?>" href="<?= base_url('admin/reset_password/' . $row['user_id'] . '/' . $row['role_id']) ?>" onclick="return confirm('Are you sure you want to reset <?= $row['name'] ?> password?');"> Reset Password</a>
                    <input class="btn btn-warning mb-1 mt-1" type="submit" value="Update" <?php if ($row['role_id'] == 2) {
                                                                                                echo 'disabled';
                                                                                            } ?>></input>
                    <a class="btn btn-danger mb-1 mt-1 <?php if ($row['role_id'] == 2) {
                                                            echo 'disabled';
                                                        } ?>" href="<?= base_url('admin/delete_user/' . $row['user_id'] . '/' . $row['role_id'] . '/' . $row['picture']) ?>" onclick="return confirm('Are you sure you want to delete <?= $row['name'] ?> user account?');"> Delete</a>
                </td>
                <?php echo form_close(); ?>
            </tr>
        <?php } ?>
    </tbody>
    <!-- new user -->
    <tr>
        <?= form_open_multipart('admin/new_user'); ?>
        <!-- csrf token -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <td>#</td>
        <td>
            <input class="form-control" type="text" name="name" required></input>
            <?php echo form_error('name'); ?>
        </td>
        <td>
            <input class="form-control" type="email" name="email" required></input>
            <?php echo form_error('email'); ?>
        </td>
        <td>
            <input class="form-control" type="date" name="date" required></input>
            <?php echo form_error('date'); ?>
        </td>
        <td>
            <input class="form-control" type="text" name="phone" required></input>
            <?php echo form_error('phone'); ?>
        </td>
        <td>
            <select class="form-control" id="exampleFormControlSelect1" name="role_id" required>
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
            <?php echo form_error('role_id'); ?>
        </td>
        <td style="min-width:15em; max-width:16.5em">
            <input class="form-control" type="file" name="userfile" ></input>
        </td>
        <td>
            <input type="submit" class="btn btn-success" value="New User"></input>
        </td>
        </form>
    </tr>
</table>