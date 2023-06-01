<?php

class Order extends Controller
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->model('OrderModel');
    }



    public function foodOrder($id)
    {

        $foodId = $this->db->getById('tbl_food', $id);
        // print_r($foodId);
        // exit;

        $data = [
            'food' => $foodId
        ];

        $this->view('pages/order', $data);
    }


    public function editAdminOrder($id)
    {
        $deli_orderId = $this->db->getByIdView('vw_orderall', $id);

        $data = [
            'deli_orderId' => $deli_orderId
        ];
        $this->view('order/edit', $data);
    }






    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $food_id = $_POST['food_id'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $total = $price * $qty;
            $order_date = date("Y-m-d h:i:sa");
            $status_id = "4";
            $user_id = $_POST['user_id'];
            $address_id = $_POST['address_id'];
            $delivery_priceID = $_POST['delivery_priceID'];
            $delivery_companyID = $_POST['delivery_companyID'];
            $phone_number = $_POST['phone_number'];



            $order = new OrderModel();

            $order->setFoodId($food_id);
            $order->setQty($qty);
            $order->setTotal($total);
            $order->setOrderDate($order_date);
            $order->setStatusId($status_id);
            $order->setUserId($user_id);
            $order->setAddressId($address_id);
            $order->setDeliveryPriceId($delivery_priceID);
            $order->setDeliveryCompanyId($delivery_companyID);
            $order->setPhoneNumber($phone_number);



            $iscreated = $this->db->create('tbl_order', $order->toArray());

            redirect('pages/food');
        }
    }


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['order_id'];
            $food_id = $_POST['food_id'];
            $qty = $_POST['qty'];
            $total = $_POST['total'];
            $order_date = $_POST['order_date'];
            $status_id = $_POST['status_id'];
            $user_id = $_POST['user_id'];
            $address_id = $_POST['address_id'];
            $delivery_priceID = $_POST['price_id'];
            $delivery_companyID = $_POST['company_id'];
            $phone_number = $_POST['phone_number'];


            $order = new OrderModel();

            $order->setId($id);
            $order->setFoodId($food_id);
            $order->setQty($qty);
            $order->setTotal($total);
            $order->setOrderDate($order_date);
            $order->setStatusId($status_id);
            $order->setUserId($user_id);
            $order->setAddressId($address_id);
            $order->setDeliveryPriceId($delivery_priceID);
            $order->setDeliveryCompanyId($delivery_companyID);
            $order->setPhoneNumber($phone_number);


            $iscreated = $this->db->update('tbl_order', $order->getId(), $order->toArray());
            redirect('order/table');
        }
    }
}
