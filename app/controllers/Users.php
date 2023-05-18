<?php

class Users extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('UserModel');
        $this->db = new Database();     // Database conn
    }

    public function formRegister()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['email_check']) && $_POST['email_check'] == 1
        ) {
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
            if ($isUserExist) {
                echo 'Sorry! email has already taken. Please try another.';
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check user exist
            $email = $_POST['email'];



            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
            if ($isUserExist) {
                // echo "Hello qq"; // check form
                // exit;
                setMessage('error', 'This email is already registered !');
                redirect('pages/register');
            } else {
                // echo "Hello";
                // Validate entries
                $validation = new UserValidator($_POST);
                $data = $validation->validateForm();
                if (count($data) > 0) {

                    //    print_r($data);
                    //  exit;

                    $this->view('pages/register', $data);
                } else {

                    // $id = $_POST['id'];
                    $name = $_POST['name'];
                    $phone_number = $_POST['phone_number'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];


                    //Hash Password before saving
                    $password = base64_encode($password);

                    $user = new UserModel();
                    // $user->setId($id);
                    $user->setName($name);
                    $user->setPhoneNo($phone_number);
                    $user->setEmail($email);
                    $user->setPassword($password);

                    // print_r($user);
                    // exit;


                    $userCreated = $this->db->create('users', $user->toArray());
                    redirect('pages/login');
                }
            }
        }
    }


    public function login()
    {
        //  echo "Hello Bo Kaw";
        //  exit; check form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = base64_encode($_POST['password']);
                redirect('pages/index');

                // $isEmailExist = $this->db->columnFilter('users', 'email', $email);
                // print_r($isEmailExist);
                // exit;
                // $isPasswordExist = $this->db->columnFilter('users', 'password', $password);

                // if ($isEmailExist && $isPasswordExist) {
                //     echo "Login success";
                // } else {
                //     echo "login fail";
                // }
                // print_r($email);
                // print_r($password);
            }
        }
    }

    function logout($id)
    {
        // session_start();
        // $this->db->unsetLogin(base64_decode($_SESSION['id']));

        //$this->db->unsetLogin($this->auth->getAuthId());
        $this->db->unsetLogin($id);
        redirect('pages/login');
    }
}
