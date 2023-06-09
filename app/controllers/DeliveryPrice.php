<?php

class DeliveryPrice extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('DeliveryPriceModel');
        $this->db = new Database();
    }



    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $city_id = $_POST['city_id'];
            $township_id = $_POST['township_id'];
            $street_id = $_POST['street_id'];
            if ($city_id == "Select City" || $township_id == "Select Township" || $street_id == "Select Street Name") {

                echo "Please fill in all the required fields.";
                redirect('Dashboard/createDeliveryPrice');
                die();
            }


            $deliveryCompany_id = $_POST['company_id'];
            $deliveryPrice_id = $_POST['price_id'];



            $deliveryprice = new DeliveryPriceModel();

            $deliveryprice->setCity_ID($city_id);
            $deliveryprice->setTownship_ID($township_id);
            $deliveryprice->setStreet_ID($street_id);
            $deliveryprice->setDeliveryCompany_ID($deliveryCompany_id);
            $deliveryprice->setDeliveryPrice_ID($deliveryPrice_id);
            // print_r($deliveryprice);
            // exit;

            // $iscreated = $this->db->create('delivery_price', $deliveryprice->toArray());
            // redirect('Dashboard/deliveryPrice');


            $iscreated = $this->db->create('delivery_price', $deliveryprice->toArray());
            // print_r($iscreated);
            // exit;
            setMessage('success', 'Create successful!');
            redirect('Dashboard/deliveryPrice');

            // ...
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['deliveryPrice_id'];
            $city_id = $_POST['city_id'];
            $township_id = $_POST['township_id'];
            $street_id = $_POST['street_id'];
            $deliveryPrice_id = $_POST['price_id'];
            $deliveryCompany_id = $_POST['deliveryCompany_id'];


            $deliveryprice = new DeliveryPriceModel();

            $deliveryprice->setId($id);
            $deliveryprice->setCity_ID($city_id);
            $deliveryprice->setTownship_ID($township_id);
            $deliveryprice->setStreet_ID($street_id);
            $deliveryprice->setDeliveryCompany_ID($deliveryCompany_id);
            $deliveryprice->setDeliveryPrice_ID($deliveryPrice_id);

            $iscreated = $this->db->update('delivery_price', $deliveryprice->getId(), $deliveryprice->toArray());
            redirect('Dashboard/deliveryPrice');
        }
    }
}
