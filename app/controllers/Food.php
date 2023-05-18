<?php
class Food extends Controller{
    private $db;
    public function __construct()
    {
       $this->model('FoodModel');
       $this->db =new Database(); 
    }
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $msg = "";
            $image = $_FILES['image']['name'];
            $target = "food_images/" . basename($image); //$target = "../../../public/images/categoryPhoto/" . basename($image);

            if (!file_exists('food_images/')) {
                mkdir('food_images/', 0777, true);
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
            $food = new FoodModel();

            $food->setTitle($title);
            $food->setDescription($description);
            $food->setPrice($price);
            $food->setFoodImage($image);
            $food->setCategoryid($category);
            $food->setFeatured($featured);
            $food->setActive($active);

            $iscreated = $this->db->create('tbl_food', $food->toArray());
            redirect('Dashboard/food');






        }

    }
}

?>