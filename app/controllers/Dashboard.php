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

    public function category()
    {
        $tbl_category = $this->db->readAll('tbl_category');
        $data = ['tbl_category' => $tbl_category]; //edit for table as multiple name
        $this->view('category/table', $data);
    }


    public function food()
    {
        $tbl_food = $this->db->readAll('tbl_food');
        $data = ['tbl_food' => $tbl_food];
        $this->view('food/table', $data);
    }
    public function createCategory()
    {
        $this->view('category/create');
    }
    public function createFood()
    {
        $this->view('food/create');
    }
}
