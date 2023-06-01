<?php

class Delivery extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('DeliveryModel');

        $this->db = new Database();
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_id = $_POST['user_id'];
            $address_id = $_POST['address_id'];
            $company_id = $_POST['company_id'];
            $price_id = $_POST['price_id'];



            $delivery = new DeliveryModel();

            $delivery->setUserId($user_id);
            $delivery->setAddressId($address_id);
            $delivery->setCompanyId($company_id);
            $delivery->setPriceId($price_id);

            $iscreated = $this->db->create('delivery', $delivery->toArray());

            redirect('Dashboard/delivery');
        }
    }
}
