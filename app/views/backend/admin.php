<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>

<!--  Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h2>Manage Admin</h2>
        <br />


        <table class=" tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            foreach ($data['users'] as $user) {
                $row = $user['role'];
                if ($row == 1) {
            ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['phone_number']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>
                            <a href="#" class="btn-danger">Delete Admin</a>

                        </td>
                    </tr>


            <?php
                }
            }
            ?>


        </table>

    </div>
</div>

<!--  Main Content Ends-->
<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>