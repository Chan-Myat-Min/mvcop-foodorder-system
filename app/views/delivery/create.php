<?php
session_start();
require_once APPROOT . '/views/inc/admin/header.php';
$database = new Database();
?>


<?php
$sessionEmail = $_SESSION['email'];

$user = $database->getBySessionEmail('users', $sessionEmail);

$userId = $user['id'];

$userDetails = $database->getByEmail('vw_userprofileupdate', $sessionEmail);

$companyDetails = $database->readAll('delivery_company');

$priceDetails = $database->readAll('price');

$phone_number = $database->getById('users', $userId);

$userPhoneNumber = $phone_number['phone_number'];




?>
<div class="main-content">
    <div class="wrapper">
        <h1> Add Delivery</h1>

        <br /><br />



        <!-- Add Category Form Starts-->
        <form action="<?php echo URLROOT; ?>/Delivery/store" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>User_Name: </td>
                    <td>
                        <select class="input-address" name="user_id">
                            <option value="<?= $userId; ?>">
                                <?= $user['name']; ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Address_Name: </td>
                    <td>
                        <select class="input-address" name="address_id">
                            <?php
                            foreach ($userDetails as $user) {
                            ?>
                                <option value="<?= $user['address_id']; ?>">
                                    <?= $user['user_address']; ?>
                                <?php
                            }
                                ?>
                                </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Company_Name: </td>
                    <td>

                        <select class="input-address" name="company_id">
                            <?php
                            foreach ($companyDetails as $companyDetail) {
                            ?>
                                <option value="<?= $companyDetail['id']; ?>">
                                    <?= $companyDetail['company_name']; ?>
                                <?php
                            }
                                ?>
                                </option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>


                        <select class="input-address" name="price_id">
                            <?php
                            foreach ($priceDetails as $priceDetail) {
                            ?>
                                <option value="<?= $priceDetail['id']; ?>">
                                    <?= $priceDetail['price']; ?>
                                <?php
                            }
                                ?>
                                </option>
                        </select>



                    </td>
                </tr>


                <td colspan="2">
                    <input type="submit" name="submit" value="Add Delivery" class="btn-secondary">

                </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>