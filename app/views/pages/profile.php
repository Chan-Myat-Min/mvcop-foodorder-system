<?php
session_start();
require_once APPROOT . '/views/inc/header.php';
require_once APPROOT . '/views/components/auth_message.php';
$database = new Database();
?>

<?php
$sessionEmail = $_SESSION['email'];

$user = $database->getBySessionEmail('users', $sessionEmail);
// echo "<pre>";
// print_r($user);
// exit;
$userId = $user['id'];
$userName = $user['name'];
$userEmail = $user['email'];
$userPhone_number = $user['phone_number'];


$userDetails = $database->getByEmail('vw_userprofile', $sessionEmail);

//$userName = $userDetails[0]['name'];
//$userEmail = $userDetails[0]['email'];
//$userPhone_number = $userDetails[0]['phone_number'];

?>

<section class="food-search_profile">
    <div class="container">

        <h2 class="text-center text-white">User Information ;</h2>


        <form action="" method="POST" class="order">

            <fieldset>
                <legend><b>Profile Details</b></legend>


                <table class="tbl-32">
                    <tr>
                        <td><b>Name :</b></td>
                        <td>
                            <input type="text" name="name" class="input-responsive" value="<?php echo $userName; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Email :</b></td>
                        <td>
                            <input type="text" name="email" class="input-responsive" value="<?php echo $userEmail; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td><b>PhoneNumber:</b> </td>
                        <td>
                            <input type="text" name="phoneNumber" class="input-responsive" value="<?php echo $userPhone_number; ?>" readonly>
                        </td>
                    </tr>


                    <tr>
                        <?php
                        $count = 1;
                        foreach ($userDetails as $address) {
                        ?>
                            <td><b>Address :<?php echo $count++; ?></b></td>
                            <td>
                                <input type="text" name="address" value="<?= $address['user_address']; ?>" id="" cols="30" rows="5" class="input-responsive" readonly>
                            </td>
                    </tr>
                <?php
                        }
                ?>

                </table>
                <b>
                    <a href="<?php echo URLROOT; ?>/Pages/updateProfile/?id=<?php echo $userId; ?>" class="btn-secondary input-responsive">Edit_Profile</a>

            </fieldset>
        </form>

    </div>
</section>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>