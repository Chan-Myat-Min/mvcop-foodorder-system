<?php
session_start();

require_once APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/components/auth_message.php';
$database = new Database();
//echo "Hello";
// exit;
?>

<?php
$sessionEmail = $_SESSION['email'];
$user = $database->getByEmailOne('users', $sessionEmail);
$userId = $user['id'];
// print_r($userId);
// exit;
$userDetails = $database->getBySessionEmailAll('vw_userprofile', $sessionEmail);
$companyDetails = $database->readAll('delivery_company');
// print_r($userDetails);
// exit;

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>



        <form action="<?php echo URLROOT; ?>/Order/store" method="POST" class="order">


            <input type="hidden" name="food_id" value="<?= $data['food']['id']; ?>">
            <input type="hidden" name="user_id" value="<?= $userId; ?>">
            <fieldset>
                <legend>Selected Food</legend>

                <?php
                if ($data['food']['image']) {
                ?>
                    <img src="<?php echo URLROOT; ?>/food_images/<?php echo $data['food']['image']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                <?php
                } else {
                    echo "<div class = 'error'> Image Not Available ;";  //  $total = $price * $qty; // total = price x qty $order_date = date("Y-m-s h:i:sa"); 
                }
                ?>

                <div class="food-menu-desc">
                    <h3><?php echo $data['food']['title']; ?></h3>


                    <p class="food-price">$<?php echo $data['food']['price']; ?></p>
                    <input type="hidden" name="price" value="<?= $data['food']['price']; ?>">

                    <input type="number" name="qty" class="input-responsive" value="1" min="1" required>
            </fieldset>
            <fieldset>
                <legend>Address and Confirm: </legend>
                <tr>
                    <fieldset>
                        <legend>
                            <div class="order-label">Company Name:</div>
                        </legend>
                        <td>
                            <select class="input-address" id="company-name" name="delivery_companyID" onchange="GetCompany(this.value)">
                                <?php
                                foreach ($companyDetails as $companyDetail) :
                                ?>
                                    <option value="<?= $companyDetail['id']; ?>">
                                        <?= $companyDetail['company_name']; ?>
                                    <?php endforeach; ?>
                                    </option>
                            </select>

                        </td>
                    </fieldset>

                    <fieldset>
                        <legend>
                            <div class="order-label">Address Name:</div>
                        </legend>
                        <td>
                            <select class="input-address" name="address_id" id="address" onchange="GetPrice(this.value, document.getElementById('company-name').value)">
                                <option selected value="">
                                    Select Address
                                </option>
                            </select>
                        </td>
                    </fieldset>
                    <span>Delivery Fee: </span>
                    <div>
                        <select class="input-address" name="delivery_priceID" id="price_id">
                            <option selected="selected">
                                Delivery Fee
                            </option>
                        </select>

                        <input type="hidden" name="phone_number" value="<?= $user['phone_number']; ?>" readonly>

                    </div>


            </fieldset>
            </tr>
            </br></br>
            <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
    </div>
    </fieldset>

    </form>

    </div>
</section>




<!-- fOOD sEARCH Section Ends Here -->

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
<script>
    $(document).ready(function() {
        GetCompany(companyName);
        GetPrice(addressID, companyName);

    });

    // Pull out township list by city id
    function GetCompany(companyName) {
        // alert(companyName);
        var url = 'Pages';
        var form_url = '<?php echo URLROOT; ?>/' + url + '/address';
        // alert(form_url);
        $.ajax({
            url: form_url,
            type: 'GET',
            data: jQuery.param({
                companyName: companyName
            }), //parse parameter 
            success: function(address_list) {
                // alert(address_list);
                document.getElementById("address").innerHTML = address_list;
                // GetStreetNameListByTownshipId(0);
            }
        });
    }

    // Pull out street name list by township id
    function GetPrice(addressId, companyName) {
        // alert(addressId);
        // alert(companyName);
        var url = 'Pages';
        var form_url = '<?php echo URLROOT; ?>/' + url + '/price';

        // alert(form_url);
        $.ajax({
            url: form_url,
            type: 'GET',
            data: jQuery.param({
                addressId: addressId,
                companyName: companyName
            }), //parse parameter 
            success: function(price) {
                document.getElementById("price_id").innerHTML = price;
            }
        });
    }
</script>