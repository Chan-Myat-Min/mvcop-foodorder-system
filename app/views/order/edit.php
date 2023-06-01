<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<div class="main-content">
    <div class="wrapper">

        <?php
        $database = new Database();

        $statusDetails = $database->readAll('status');


        ?>

        <h1>Update Order Delivery</h1>
        <br><br>

        <form action="<?php echo URLROOT; ?>/Order/update" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="order_id" value=" <?= $data['deli_orderId']['order_ID']; ?>">
            <input type="hidden" name="food_id" value=" <?= $data['deli_orderId']['food_ID']; ?>">
            <input type="hidden" name="qty" value=" <?= $data['deli_orderId']['qty']; ?>">
            <input type="hidden" name="total" value=" <?= $data['deli_orderId']['total']; ?>">
            <input type="hidden" name="order_date" value=" <?= $data['deli_orderId']['order_date']; ?>">
            <input type="hidden" name="user_id" value=" <?= $data['deli_orderId']['user_ID']; ?>">
            <input type="hidden" name="address_id" value=" <?= $data['deli_orderId']['address_ID']; ?>">
            <input type="hidden" name="price_id" value=" <?= $data['deli_orderId']['price_ID']; ?>">
            <input type="hidden" name="company_id" value=" <?= $data['deli_orderId']['company_ID']; ?>">
            <input type="hidden" name="phone_number" value=" <?= $data['deli_orderId']['phone_number']; ?>">



            <table class="tbl-30">
                <tr>
                    <td>Order ID: </td>
                    <td>
                        <?= $data['deli_orderId']['order_ID']; ?>

                    </td>
                </tr>
                <tr>
                    <td>Food Name: </td>
                    <td>
                        <?= $data['deli_orderId']['title']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Qty: </td>
                    <td>
                        <?= $data['deli_orderId']['qty']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <?= $data['deli_orderId']['food_Price']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Total: </td>
                    <td>
                        <?= $data['deli_orderId']['total']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Order Date: </td>
                    <td>
                        <?= $data['deli_orderId']['order_date']; ?>

                    </td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status_id">
                            <?php foreach ($statusDetails as $statusDetail) {
                            ?>
                                <option value="<?php echo $statusDetail['id']; ?>"><?php echo $statusDetail['status']; ?></option>

                            <?php
                            }

                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td>
                        <?= $data['deli_orderId']['name']; ?>

                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <?= $data['deli_orderId']['user_address']; ?>

                    </td>
                </tr>
                <tr>
                    <td>Delivery Fee: </td>
                    <td>
                        <?= $data['deli_orderId']['delivery_Price']; ?>

                    </td>
                </tr>
                <tr>
                    <td>Company Name: </td>
                    <td>
                        <?= $data['deli_orderId']['delivery_CompanyName']; ?>
                    </td>
                </tr>
                <tr>
                    <td>User_Phone_Number: </td>
                    <td>
                        <?= $data['deli_orderId']['phone_number']; ?>

                    </td>
                </tr>



                <tr>
                    <td colspan="2">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>