<?php
require_once APPROOT . '/views/inc/header.php';
require_once APPROOT . '/views/components/auth_message.php';
$database = new Database();

$id = $_GET['id'];

$user = $database->getById('users', $id);
// print_r($user);
// exit;
?>


<section class="food-search_profile">
    <div class="container">

        <h2 class="text-center text-white">User Information ;</h2>


        <form action="<?php echo URLROOT; ?>/Users/update" method="POST" class="order">
            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
            <input type="hidden" name="password" value="<?= $user['password']; ?>">
            <fieldset>
                <legend><b>Profile Details</b></legend>
                <table class="tbl-32">
                    <tr>
                        <td><b>Name :</b></td>
                        <td>
                            <input type="text" name="name" class="input-responsive" value="<?= $user['name']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><b>Email :</b></td>
                        <td>
                            <input type="text" name="email" class="input-responsive" value="<?= $user['email']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><b>PhoneNumber:</b> </td>
                        <td>
                            <input type="text" name="phoneNumber" class="input-responsive" value="<?= $user['phone_number']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><b>City</b> </td>
                        <td>
                            <select class="input-responsive" id="city_list" name="city" required onchange='GetTownshipListByCityId(this.value)'>

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
                        <td><b>TownShip</b></td>
                        <td>
                            <select class="input-responsive" id="township_list" name="township" required onchange='GetStreetNameListByTownshipId(this.value)'>
                                <option selected="selected">Select Township</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Street</b></td>
                        <td>
                            <select class="input-responsive" id="street_name_list" name="street_name" required>
                                <option selected="selected">Select Street Name</option>
                            </select>
                        </td>
                    </tr>

                </table>
                <br>
                <input type="submit" name="submit" value="Update_Profile" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
    </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php require_once APPROOT . '/views/inc/footer.php'; ?>


<script>
    $(document).ready(function() {
        GetTownshipListByCityId(cityId);
        GetStreetNameListByTownshipId(townshipId);

    });

    // Pull out township list by city id
    function GetTownshipListByCityId(cityId) {
        var url = 'Pages';
        var form_url = '<?php echo URLROOT; ?>/' + url + '/township';
        // alert(form_url);
        $.ajax({
            url: form_url,
            type: 'GET',
            data: jQuery.param({
                cityId: cityId
            }), //parse parameter 
            success: function(townshipList) {
                // alert(townshipList);
                document.getElementById("township_list").innerHTML = townshipList;
                // GetStreetNameListByTownshipId(0);
            }
        });
    }

    // Pull out street name list by township id
    function GetStreetNameListByTownshipId(townshipId) {
        var url = 'Pages';
        var form_url = '<?php echo URLROOT; ?>/' + url + '/street';
        $.ajax({
            url: form_url,
            type: 'GET',
            data: jQuery.param({
                townshipId: townshipId
            }), //parse parameter 
            success: function(streetNameList) {
                document.getElementById("street_name_list").innerHTML = streetNameList;
            }
        });
    }
</script>