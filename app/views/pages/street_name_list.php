<option value="">Select Street Name</option>
<?php
$database = new Database();
if (!empty($_GET['townshipId'])) {

    $townshipId = $_GET['townshipId'];
    $streetDatas = $database->getByAddressId('street', 'township_id', $townshipId);
?>

    <?php foreach ($streetDatas as $streetData) { ?>
        <option value="<?php echo $streetData['id']; ?>"><?php echo $streetData['name']; ?></option>
<?php }
}
