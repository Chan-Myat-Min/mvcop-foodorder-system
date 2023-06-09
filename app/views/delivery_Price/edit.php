<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<div class="main-content">
    <div class="wrapper">

        <?php


        $database = new Database();
        $deliveryPrices = $database->readAll('price');
        //print_r($deliveryPrices);
        $deliveryPriceID = $data['deli_Price_Id']['deliveryPrice_ID'];
        // print_r($deliveryPriceID);
        // exit;
        $deliveryPriceDetails = $database->getById('delivery_price', $deliveryPriceID);
        // print_r($deliveryPriceDetails);

        // echo $deliveryPriceDetails['township_id'];
        // exit;


        //$statusDetails = $database->readAll('vw_deliveryprice');


        ?>

        <h1>Update Delivery</h1>
        <br><br>
        <form action="<?php echo URLROOT; ?>/DeliveryPrice/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="deliveryPrice_id" value=" <?= $deliveryPriceID; ?>">
            <input type="hidden" name="city_id" value=" <?= $deliveryPriceDetails['city_id']; ?>">
            <input type="hidden" name="township_id" value=" <?= $deliveryPriceDetails['township_id']; ?>">
            <input type="hidden" name="street_id" value=" <?= $deliveryPriceDetails['street_id']; ?>">
            <input type="hidden" name="deliveryCompany_id" value=" <?= $deliveryPriceDetails['deliveryCompany_id']; ?>">

            <table class="tbl-30">
                <tr>
                    <td>Address: </td>
                    <td>
                        <?= $data['deli_Price_Id']['delivery_address']; ?>

                    </td>
                </tr>
                <tr>
                    <td>Delivery Company: </td>
                    <td>
                        <?= $data['deli_Price_Id']['deliveryCompany_Name']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Delivery Fee: </td>
                    <td>
                        <select name="price_id">
                            <?php foreach ($deliveryPrices as $deliveryPrice) {
                            ?>
                                <option value="<?php echo $deliveryPrice['id']; ?>"><?php echo $deliveryPrice['price']; ?></option>

                            <?php
                            }

                            ?>
                        </select>

                    </td>

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