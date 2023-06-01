<?php
$database = new Database();
if (!empty($_GET['cityId'])) {

    $cityId = $_GET['cityId'];
    // echo $cityId;
    // exit;
    $townshipDatas = $database->getByAddressId('township', 'city_id', $cityId);

?>
    <option value="">Select Township</option>
    <?php foreach ($townshipDatas as $townshipData) { ?>
        <option value="<?php echo $townshipData['id']; ?>"><?php echo $townshipData['name']; ?></option>
<?php }
}
