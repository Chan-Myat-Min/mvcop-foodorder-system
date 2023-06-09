<?php

class Pages extends Controller
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function index()
    {
        $category = $this->db->readAll('tbl_category');
        $food = $this->db->readAll('tbl_food');

        $data = [
            'food' => $food,
            'category' => $category
        ];
        $this->view('pages/index', $data);
    }

    public function categories()
    {
        $category = $this->db->readAll('tbl_category');
        $data = [
            'category' => $category
        ];
        $this->view('pages/categories', $data);
    }
    public function food()
    {
        $food = $this->db->readAll('tbl_food');
        $data = [
            'food' => $food
        ];
        $this->view('pages/food', $data);
    }
    public function login()
    {
        $this->view('pages/login');
    }
    public function register()
    {
        $this->view('pages/register');
    }
    public function order()
    {
        $this->view('pages/view_order_table');
    }
    public function profile()
    {
        $this->view('pages/profile');
    }
    public function updateProfile()
    {
        $this->view('pages/update_profile');
    }

    public function township()
    {
        $this->view('pages/township_list');
    }
    public function street()
    {
        $this->view('pages/street_name_list');
    }
    public function address()
    {
        $this->view('pages/address_list');
    }
    public function price()
    {
        $this->view('pages/price_list');
    }
    //for delivery
    public function addToCard()
    {
        $this->view('pages/add_to_card');
    }
}
