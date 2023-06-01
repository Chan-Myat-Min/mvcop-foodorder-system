<?php
$database = new Database();
if (!empty($_GET['addressId']) && !empty($_GET['companyName'])) {
    $addressId = $_GET['addressId'];
    $companyId = $_GET['companyName'];

    $price = $database->getPriceByAddressNameAndCompanyName('vw_deliverydetails', 'address_id', $addressId, 'delivery_companyID', $companyId);

?>
    <option value="<?= $price['Price_ID']; ?>"><?= $price['delivery_price']; ?></option>
<?php

}
