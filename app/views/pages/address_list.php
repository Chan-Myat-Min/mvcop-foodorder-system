<?php
$database = new Database();
if (!empty($_GET['companyName'])) {
    $companyId = $_GET['companyName'];

    $addresslists = $database->getByCompanyName('vw_deliverydetails', 'delivery_companyID', $companyId);

?>
    <option value="">Select Address</option>
    <?php foreach ($addresslists as $addresslist) {
    ?>
        <option value="<?= $addresslist['address_id']; ?>"><?= $addresslist['user_address']; ?></option>
<?php
    }
}


?>