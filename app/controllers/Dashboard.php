<?php

class Dashboard extends Controller
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function index()
    {

        $this->view('backend/dashboard');
    }

    public function admin()
    {
        $user = $this->db->readAll('users');
        $data = [
            'users' => $user
        ];

        $this->view('backend/admin', $data);
    }

    //For Category meethod

    public function category()
    {
        $tbl_category = $this->db->readAll('tbl_category');
        $data = ['tbl_category' => $tbl_category]; //edit for table as multiple name
        $this->view('category/table', $data);
    }
    public function createCategory()
    {
        $this->view('category/create');
    }
    public function editCategory()
    {
        $this->view('category/edit');
    }


    //For Food
    public function food()
    {
        $tbl_food = $this->db->readAll('tbl_food');
        $data = ['tbl_food' => $tbl_food];
        $this->view('food/table', $data);
    }

    public function createFood()
    {
        $tbl_category = $this->db->readAll('tbl_category');
        $data = ['tbl_category' => $tbl_category];
        $this->view('food/create', $data);
    }

    //for order
    public function order()
    {
        $tbl_order = $this->db->readAll('tbl_order');
        $data = ['tbl_order' => $tbl_order];

        $this->view('order/table', $data);
    }


    //for deli COmpany
    public function deliveryCompany()
    {
        $deliveryCompany = $this->db->readAll('delivery_company');
        $data = ['delivery_company' => $deliveryCompany];
        $this->view('deliverycompany/table', $data);
    }
    public function createDeliveryCompany()
    {
        $this->view('deliverycompany/create');
    }

    //for delivery
    public function delivery()
    {
        $this->view('delivery/table');
    }
    public function createDelivery()
    {
        $this->view('delivery/create');
    }


    //for deliveryPrice Table
    public function deliveryPrice()
    {
        $this->view('delivery_Price/table');
    }
    public function createDeliveryPrice()
    {
        $this->view('delivery_Price/create');
    }
    // public function updateDeliveryPrice()
    // {
    //     $this->view('delivery_Price/edit');
    // }





    public function editDeliveryPrice($id)
    {

        $deli_Price_Id = $this->db->getByIddeliveryPriceView('vw_deliveryprice', $id);


        // $deli_Price_Id = $this->db->getByDeliveryPriceIdView('vw_deliveryprice', $id);

        $data = [
            'deli_Price_Id' => $deli_Price_Id
        ];
        $this->view('delivery_Price/edit', $data);
    }

    // public function editAdminOrder($id)
    // {
    //     $deli_orderId = $this->db->getByIdView('vw_orderall', $id);

    //     $data = [
    //         'deli_orderId' => $deli_orderId
    //     ];
    //     $this->view('order/edit', $data);
    // }



}
