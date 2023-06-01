<?php require_once APPROOT . '/views/inc/admin/header.php';
$database = new Database();
$deliverys = $database->readAll('vw_deliverydetails');
?>

<!--  Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h2>Manage Delivery</h2>
        <br /><br>

        <a href="<?php echo URLROOT; ?>/Dashboard/createDelivery" class="btn-primary">Add Delivery</a>


        <table class=" tbl-full">
            <tr>
                <th>S.N</th>
                <th>User_Name</th>
                <th>Address_Name</th>
                <th>Company_Name</th>
                <th>Delivery_Price</th>
                <th>Phone_number</th>
                <th>Actions</th>

            </tr>
            <?php
            $sn = 1;
            foreach ($deliverys as $delivery) {
            ?>
                <tr>
                    <td><?= $sn++; ?></td>
                    <td><?= $delivery['user_name']; ?></td>
                    <td><?= $delivery['user_address']; ?></td>
                    <td><?= $delivery['delivery_companyName']; ?></td>
                    <td><?= $delivery['delivery_price']; ?></td>
                    <td><?= $delivery['phone_number']; ?></td>
                    <td>
                        <a href="" class="btn-secondary">Update</a>
                        <a href="" class="btn-danger">Delete</a>
                    </td>
                </tr>

            <?php
            }
            ?>









        </table>

    </div>
</div>

<!--  Main Content Ends-->
<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>