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
    public function category()
    {
        $tbl_category = $this->db->readAll('tbl_category');
        $data = ['tbl_category' => $tbl_category]; //edit for table as multiple name
        $this->view('category/table', $data);
    }
    public function destroy($id)
    {
        $categoryData = $this->db->getById('tbl_category', $id);
        $categoryImage = $categoryData['image_name'];

        $category = new CategoryModel();

        $category->setId($id);

        $isDestroyed = $this->db->delete('tbl_category', $category->getId());
        if ($isDestroyed) {
            if ($categoryImage) {
                $remove_path = "category_images/" . $categoryImage;
                if (file_exists($remove_path)) {
                    unlink($remove_path);
                }
            }
        }

        redirect('Dashboard/category');
    }
    public function edit($id)
    {
        $id = base64_decode($id);
        //$types = $this->db->readAll('types');
        // print_r($types);

        $category = $this->db->getById('tbl_category', $id);
        // print_r($category);

        $data = [
            'categories' => $category
        ];

        $this->view('category/edit', $data);
    }


    // public function editcategory($id)
    // {
    //     $tbl_category = $this->db->getById('tbl_category', $id);
    //     // print_r($category);
    //     // $types = $this->db->readAll('types');
    //     // print_r($types);



    //     $data = ['categories' => $tbl_category];

    //     $this->view('category/edit', $data);
    // }

    // public function update()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $id = $_POST['id'];
    //         $name = $_POST['name'];
    //         $description = $_POST['description'];
    //         $type_id = $_POST['type_id'];
    //         // echo $name;

    //         $category = new CategoryModel();
    //         $category->setId($id);
    //         $category->setName($name);
    //         $category->setDescription($description);
    //         $category->setTypeId($type_id);

    //         $isUpdated = $this->db->update('categories', $category->getId(), $category->toArray());
    //         // echo $isUpdated;
    //         setMessage('success', 'Update successful!');
    //         redirect('category');
    //     }
    // }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $image = $_FILES['image']['name'];
            if ($image) {
                if (!file_exists('category_images/')) {
                    mkdir('category_images/', 0777, true);
                }
                $target = "category_images/" . $image;
                $sourcePath = $_FILES['image']['tmp_name'];
                move_uploaded_file($sourcePath, $target);

                if ($current_image) {
                    $remove_path = "category_images/" . $current_image;
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


            $category = new CategoryModel();
            $category->setId($id);
            $category->setTitle($title);
            $category->setImage($image);
            $category->setFeatured($featured);
            $category->setActive($active);

            $iscreated = $this->db->update('tbl_category', $category->getId(), $category->toArray());
            redirect('Dashboard/category');
        }
    }
}
