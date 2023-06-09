<?php
$database = new Database();
if (!empty($_GET['addressId']) && !empty($_GET['companyName'])) {
    $addressId = $_GET['addressId'];
    $companyId = $_GET['companyName'];

    $price = $database->getPriceByAddressNameAndCompanyName('vw_deliveryprice', 'delivery_address', $addressId, 'deliveryCompany_ID', $companyId);

?>
    <option value="<?= $price['Price_ID']; ?>"><?= $price['delivery_Price']; ?></option>
<?php

}
