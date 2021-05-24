<table id="example" class="display" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Created</th>
            <th>Phone Number</th>
            <th>Account Type</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dbdata as $row) { ?>
            <tr>
                <form method="POST" action="<?= base_url('admin/update_user/'); ?>" id="<?= $row['user_id'] ?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <td><?= $row['user_id'] ?></td>
                    <td>
                        <div hidden>
                            <?= $row['name'] ?>
                        </div>
                        <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>" required></input>
                    </td>
                    <td>
                        <div hidden>
                            <?= $row['email'] ?>
                        </div>
                        <input class="form-control" type="email" name="email" value="<?= $row['email'] ?>" required></input>
                    </td>
                    <td>
                        <div hidden>
                            <?= $row['date'] ?>
                        </div>
                        <input class="form-control" type="date" name="date" value="<?= $row['date'] ?>" required></input>
                    </td>
                    <td>
                        <div hidden>
                            <?= $row['phone'] ?>
                        </div>
                        <input class="form-control" type="text" name="phone" value="<?= $row['phone'] ?>" required></input>
                    </td>
                    <td>
                        <div hidden>
                            <?php if ($row['role_id'] == 1) {
                                echo 'User';
                            }else echo 'Admin'; ?>
                        </div>
                        <select class="form-control" name="role_id">
                            <option value="1" <?php if ($row['role_id'] == 1) {
                                                    echo 'selected="selected"';
                                                } ?>>User</option>
                            <option value="2" <?php if ($row['role_id'] == 2) {
                                                    echo 'selected="selected"';
                                                } ?>>Admin</option>
                        </select>
                    </td>
                    <td>
                        <input class="btn btn-warning" type="submit" value="Update"></input>
                        <a class="btn btn-danger" href="<?= base_url('admin/delete_user/' . $row['user_id']) ?>"> Delete</a>
                    </td>
                </form>
            </tr>
        <?php } ?>
    </tbody>
    <!-- new user -->
    <tfoot>
        <tr>
            <form method="POST" action="<?= base_url('admin/new_user'); ?>">
                <td>X</td>
                <td>
                    <input class="form-control" type="text" name="name" required></input>
                </td>
                <td>
                    <input class="form-control" type="email" name="email" required></input>
                </td>
                <td>
                    <input class="form-control" type="date" name="date" required></input>
                </td>
                <td>
                    <input class="form-control" type="text" name="phone" required></input>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" name="role_id" required>
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                </td>
                <td>
                    <input class="btn btn-success" type="submit" value="New User"></input>
                </td>
            </form>
        </tr>
    </tfoot>

</table>
<script>
    $(document).ready(function() {
        $("#edit1").click(function() {
            alert("The paragraph was clicked.");
        });
    });
</script>