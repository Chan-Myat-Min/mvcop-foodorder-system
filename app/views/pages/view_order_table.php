<?php
session_start();
require_once APPROOT . '/views/inc/header.php';
$database = new Database();
?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/table.css">
<?php
$sessionEmail = $_SESSION['email'];
$user = $database->getBySessionEmail('users', $sessionEmail);

$user_id = $user['id'];
// print_r($user_id);
$userDetails = $database->getByIdAll('vw_orderall', $user_id);


?>
<section class="food-search_profile">
    <h1>User Order Table</h1>

    <table id="customers" class="table">
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Status</th>
            <th>Delivery_Company</th>
            <th>Delivery_Fee</th>
            <th>Address</th>
            <th>Contact</th>
        </tr>

        <?php
        $sn = 1;
        foreach ($userDetails as $userDetail) :
        ?>
            <tr>
                <td><?= $sn++; ?></td>
                <td><?= $userDetail['name']; ?></td>
                <td><?= $userDetail['title']; ?></td>
                <td><?= $userDetail['food_Price']; ?></td>
                <td><?= $userDetail['qty']; ?></td>
                <td><?= $userDetail['total']; ?></td>
                <td><?= $userDetail['status']; ?></td>
                <td><?= $userDetail['delivery_CompanyName']; ?></td>
                <td><?= $userDetail['delivery_Price']; ?></td>
                <td><?= $userDetail['user_address']; ?></td>
                <td><?= $userDetail['phone_number']; ?></td>
            </tr>
        <?php
        endforeach;
        ?>

    </table>

    <?php require_once APPROOT . '/views/inc/footer.php'; ?>