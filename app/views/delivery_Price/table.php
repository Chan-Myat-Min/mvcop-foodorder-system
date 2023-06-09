<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php
$database = new Database();
$deliveryprices = $database->readAll('vw_deliveryprice');

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage DeliveryPrice</h1>
        <br /> <br />

        <a href="<?php echo URLROOT; ?>/Dashboard/createDeliveryPrice" class="btn-primary">Add DeliveryPrice</a>

        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N </th>
                <th>DeliveryPrice_ID</th>
                <th>Address </th>
                <th>Delivery Company </th>
                <th>Delivery_Price </th>
                <th>Active</th>

            </tr>

            <?php
            $sn = 1;  //declare for searial number

            foreach ($deliveryprices as $deliveryprice) {
            ?>
                <tr>
                    <td><?= $sn++; ?> </td>
                    <td><?= $deliveryprice['deliveryPrice_ID']; ?> </td>
                    <td><?= $deliveryprice['delivery_address']; ?> </td>
                    <td><?= $deliveryprice['deliveryCompany_Name']; ?> </td>
                    <td><?= $deliveryprice['delivery_Price']; ?> </td>

                    <td>
                        <a href="<?php echo URLROOT; ?>/Dashboard/editDeliveryPrice/<?php echo $deliveryprice['deliveryPrice_ID'] ;?>" class="btn-secondary">Update Order</a>
                        <a href="" class="btn-danger">Delete Order</a>
                    </td>
                </tr>
            <?php
            }

            ?>



        </table>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>