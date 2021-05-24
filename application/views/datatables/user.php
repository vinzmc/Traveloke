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
                    <td><?= $row['user_id'] ?></td>
                    <td>
                        <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>" disabled></input>
                    </td>
                    <td>
                        <input class="form-control" type="email" name="email" value="<?= $row['email'] ?>" disabled></input>
                    </td>
                    <td>
                        <input class="form-control" type="date" name="date" value="<?= $row['date'] ?>" disabled></input>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="phone" value="<?= $row['phone'] ?>" disabled></input>
                    </td>
                    <td>
                        <select class="form-control" name="roleid">
                            <option value="2" <?php if ($row['role_id'] == 2) {
                                                    echo 'selected="selected"';
                                                } ?>>Admin</option>
                            <option value="1" <?php if ($row['role_id'] == 1) {
                                                    echo 'selected="selected"';
                                                } ?>>User</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-secondary" id="edit">Edit</button>
                        <div id="hiddenbutton" hidden>
                            <input class="btn btn-info" type="submit" value="Save Update"></input>
                            <button class="btn btn-secondary">Cancel</button>
                        </div>
                        <a class="btn btn-danger" href="<?= base_url('admin/delete_user/' . $row['user_id']) ?>"> Delete</a>
                    </td>
                </form>
            </tr>

        <?php } ?>
        <!-- new user -->
        <tr>
            <form method="POST" action="<?= base_url('admin/new_user'); ?>">
                <td>X</td>
                <td>
                    <input class="form-control" type="text" name="name"></input>
                </td>
                <td>
                    <input class="form-control" type="email" name="email"></input>
                </td>
                <td>
                    <input class="form-control" type="date" name="date"></input>
                </td>
                <td>
                    <input class="form-control" type="text" name="phone"></input>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" name="roleid">
                        <option value="2">Admin</option>
                        <option value="1">User</option>
                    </select>
                </td>
                <td>
                    <input class="btn btn-success" type="submit" value="New User"></input>
                </td>
            </form>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th>Option</th>
        </tr>
    </tfoot>
</table>