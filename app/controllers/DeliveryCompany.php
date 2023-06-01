<?php

class DeliveryCompany extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('DeliveryCompanyModel');

        $this->db = new Database();
    }

    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
         
            $msg = "";
            $image = $_FILES['image']['name'];
            // echo $image;
            // exit;
            $target = "deliverycompany_images/" . basename($image); //$target = "../../../public/images/categoryPhoto/" . basename($image);

            if (!file_exists('deliverycompany_images/')) {
                mkdir('deliverycompany_images/', 0777, true);
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Faild To Upload Image";
            }



            $deliveryCompany = new DeliveryCompanyModel();
            $deliveryCompany->setTitle($title);
            $deliveryCompany->setImage($image);



            $categoryCreated = $this->db->create('delivery_company', $deliveryCompany->toArray());

            setMessage('success', 'Create successful!');
            redirect('Dashboard/delivery');
        }
    }
}
