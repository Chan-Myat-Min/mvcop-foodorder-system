<?php require_once APPROOT . '/views/inc/admin/header.php';

$database = new Database();

?>
<?php


$orders = $database->readAll('vw_orderall');

?>

<!--  Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h2>Manage Order</h2>
        <br /><br>

        <table class=" tbl-full">
            <tr>
                <th>S.N</th>
                <th>Order ID</th>
                <th>Food Name </th>
                <th>Quantity </th>
                <th>Price</th>
                <th>Total </th>
                <th>Order Date </th>
                <th>Status </th>
                <th>User </th>
                <th>Address </th>
                <th>Delivery_Fee </th>
                <th>DeliveryCompany </th>
                <th>PhoneNo </th>
                <th>Actions</th>
            </tr>
            <?php
            $sn = 1;  //declare for searial number

            foreach ($orders as $order) {
            ?>
                <tr>
                    <td><?= $sn++; ?> </td>
                    <td><?= $order['order_Id']; ?> </td>
                    <td><?= $order['food_Name']; ?> </td>
                    <td><?= $order['qty']; ?> </td>
                    <td><?= $order['Food_Price']; ?>MMK</td>
                    <td><?= $order['total']; ?>MMK</td>
                    <td><?= $order['order_date']; ?> </td>
                    <td><?= $order['status']; ?> </td>
                    <td><?= $order['user_Name']; ?> </td>
                    <td><?= $order['user_address']; ?> </td>
                    <td><?= $order['delivery_Price']; ?> </td>
                    <td><?= $order['delivery_CompanyName']; ?> </td>
                    <td><?= $order['phone_number']; ?> </td>

                    <td>
                        <a href="<?php echo URLROOT; ?>/Order/editAdminOrder/<?php echo $order['order_Id']; ?>" class="btn-secondary">Update Order</a>
                        <a href="" class="btn-danger">Delete Order</a>
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