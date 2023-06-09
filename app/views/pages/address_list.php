<?php
session_start();
$database = new Database();
if (!empty($_GET['companyName'])) {
    $sessionEmail = $_SESSION['email'];
    //  $companyId = $_GET['companyName'];

    $addresslists =  $database->getByEmail('vw_userprofileupdate', $sessionEmail);

?>
    <option value="">Select Address</option>
    <?php foreach ($addresslists as $user) {
    ?>
        <option value="<?= $user['user_address']; ?>"><?= $user['user_address']; ?></option>
<?php
    }
}


?>