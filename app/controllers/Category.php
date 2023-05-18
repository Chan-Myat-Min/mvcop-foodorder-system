<?php

class Category extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('CategoryModel');

        $this->db = new Database();
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            // echo $title;
            // exit;
            $msg = "";
            $image = $_FILES['image']['name'];
            // echo $image;
            // exit;
            $target = "category_images/" . basename($image); //$target = "../../../public/images/categoryPhoto/" . basename($image);

            if (!file_exists('category_images/')) {
                mkdir('category_images/', 0777, true);
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Faild To Upload Image";
            }

            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }


            $category = new CategoryModel();


            $category->setTitle($title);
            $category->setImage($image);
            $category->setFeatured($featured);
            $category->setActive($active);


            $categoryCreated = $this->db->create('tbl_category', $category->toArray());
            // if ($categoryCreated == true) {
            //     echo "Yes";
            //     exit;
            // } else {
            //     echo "No";
            //     exit;
            // }
            setMessage('success', 'Create successful!');
            redirect('Dashboard/category');

            // var_dump($categoryCreated);
            // exit;
        }
    }





    //     public function sstore()
    //     {
    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             $title = $_POST['title'];
    //             $image_name = $_POST['image_name'];
    //             $featured = $_POST['featured'];
    //             $active = $_POST['active'];

    //             $category = new CategoryModel();


    //             $category->setTitle($title);
    //             $category->setImageName($image_name);
    //             $category->setFeatured($featured);
    //             $category->setActive($active);

    //             $categoryCreated = $this->db->create('categories', $category->toArray());
    //             setMessage('success', 'Create successful!');
    //             redirect('category');
    //         }
    //     }
    // 
}
