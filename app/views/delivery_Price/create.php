<?php
session_start();
require_once APPROOT . '/views/inc/admin/header.php';
$database = new Database();
$companyDetails = $database->readAll('delivery_company');
// $database->readAll('');
$priceDetails = $database->readAll('price');
?>

<style>
    .user_id {
        appearance: none;
    }
</style>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Delivery Price</h1>
        <br><br>


        <form action="<?php echo URLROOT; ?>/DeliveryPrice/store" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>City:</td>
                    <td>
                        <select class="input-responsive" id="city_list" name="city_id" required onchange='GetTownshipListByCityId(this.value)'>

                            <option selected="selected">Select City</option>
                            <?php
                            $city_names = $database->readAll('city');
                            if ($city_names) {
                                foreach ($city_names as $city) {
                                    $city_name = $city['name'];
                                    $city_id = $city['id'];
                                    echo "<option value=$city_id>$city_name</option>";
                                }
                            } else {
                                echo "<option value=''> </option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>TownShip:</td>
                    <td>
                        <select class="input-responsive" id="township_list" name="township_id" required onchange='GetStreetNameListByTownshipId(this.value)'>
                            <option selected="selected">Select Township</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Street:</td>
                    <td>
                        <select class="input-responsive" id="street_name_list" name="street_id" required>
                            <option selected="selected">Select Street Name</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>DeliveryName:</td>
                    <td>
                        <select name="company_id">
                            <?php
                            foreach ($companyDetails as $company) {
                            ?>
                                <option value="<?php echo $company['id']; ?>"><?php echo $company['company_name']; ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Delivery Price:</td>
                    <td>
                        <select name="price_id">
                            <?php
                            foreach ($priceDetails as $price) {
                            ?>
                                <option value="<?php echo $price['id']; ?>"><?php echo $price['price']; ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <br>
                        <input type="submit" name="submit" value="Add-DeliveryPrice" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>

<script>
    $(document).ready(function() {
        GetCompany(companyName);
        GetPrice(addressID, companyName);

    });
    // Pull out township list by city id
    function GetTownshipListByCityId(cityId) {
        //console.log('get townshiops by city iD...')
        console.log(cityId);
        var url = 'pages';
        var form_url = '<?php echo URLROOT; ?>/' + url + '/township';
        //alert(form_url);
        $.ajax({
            url: form_url,
            type: 'GET',
            data: jQuery.param({
                cityId: cityId
            }), //parse parameter 
            success: function(townshipList) {
                //  alert(townshipList);
                document.getElementById("township_list").innerHTML = townshipList;
                // GetStreetNameListByTownshipId(0);
            }
        });
    }

    // Pull out street name list by township id
    function GetStreetNameListByTownshipId(townshipId) {
        var url = 'pages';
        var form_url = '<?php echo URLROOT; ?>/' + url + '/street';
        // alert(form_url);
        $.ajax({
            url: form_url,
            type: 'GET',
            data: jQuery.param({
                townshipId: townshipId
            }), //parse parameter 
            success: function(streetNameList) {
                // alert(streetNameList);
                document.getElementById("street_name_list").innerHTML = streetNameList;
            }
        });
    }
</script>