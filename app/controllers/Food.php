
    <?php
    class Food extends Controller
    {
        private $db;
        public function __construct()
        {
            $this->model('FoodModel');
            $this->db = new Database();
        }
        public function store()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $categoryId = $_POST['category'];
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
                $food->setCategoryId($categoryId);
                $food->setFeatured($featured);
                $food->setActive($active);

                $iscreated = $this->db->create('tbl_food', $food->toArray());

                redirect('Dashboard/food');
            }
        }

        public function destroy($id)
        {
            $foodData = $this->db->getById('tbl_food', $id);
            $FoodImage = $foodData['image'];

            $food = new FoodModel();
            $food->setId($id);

            $isDestroyed = $this->db->delete('tbl_food', $food->getID());
            if ($isDestroyed) {
                if ($FoodImage) {
                    $remove_path = "food_images/" . $FoodImage;
                    if (file_exists($remove_path)) {
                        unlink($remove_path);
                    }
                }
            }
            redirect('Dashboard/food');
        }
        public function edit($id)
        {
            $id = base64_decode($id);
            //$types = $this->db->readAll('types');
            // print_r($types);

            $food = $this->db->getById('tbl_food', $id);
            // print_r($category);

            $data = [
                'foods' => $food
            ];

            $this->view('food/edit', $data);
        }
        public function update()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $categoryId = $_POST['category_id'];
                $current_image = $_POST['current_image'];
                $image = $_FILES['image']['name'];
                if ($image) {
                    if (!file_exists('food_images/'))  {
                        mkdir('food_images/', 0777, true);
                    }
                    $target = "food_images/" . $image;
                    $sourcePath = $_FILES['image']['tmp_name'];
                    move_uploaded_file($sourcePath, $target);
                if ($current_image) {
                    $remove_path = "food_images/" . $current_image;
                    if (file_exists($remove_path)) {
                        unlink($remove_path);
                    }
                }
                } else {
                    $image = $current_image;
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
                $food->setId($id);
                $food->setTitle($title);
                $food->setDescription($description);
                $food->setPrice($price);
                $food->setFoodImage($image);
                $food->setCategoryid($categoryId);
                $food->setFeatured($featured);
                $food->setActive($active);

                $iscreated = $this->db->update('tbl_food', $food->getId(), $food->toArray());
                redirect('Dashboard/food');
            }
        }
        public function editFood($id)
        {
            $id = base64_decode($id);
            $category = $this->db->readAll('tbl_category');
            $foodId = $this->db->getById('tbl_food', $id);
            $data = [
                'category' => $category,
                'food' => $foodId
            ];
    
            $this->view('food/edit', $data);
        }


    }
