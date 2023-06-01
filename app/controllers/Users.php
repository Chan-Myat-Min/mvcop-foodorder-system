
<?php
session_start();

class Users extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('UserModel');
        $this->model('AddressModel');
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


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check user exist
            $email = $_POST['email'];
            $name = $_POST['name'];
            $id = $_POST['user_id'];
            $password = $_POST['password'];
            $phone_number = $_POST['phoneNumber'];
            $street_name = $_POST['street_name'];



            $address = new AddressModel();

            $address->setId("");
            $address->setStreetId($street_name);
            $address->setUserId($id);

            $addressExit = $this->db->getAddressId('address', $street_name);
            if ($addressExit) {
                $addressId = $addressExit['id'];
            } else {
                $addressCreate = $this->db->create('address', $address->toArray());
                $addressId = (int)$addressCreate;
            }


            $user = new userModel();

            $user->setId($id);
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setPhoneNo($phone_number);

            $iscreated = $this->db->update('users', $user->getId(), $user->toArray());
            redirect('Pages/profile');
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

                $isLogin = $this->db->loginCheck($email, $password);
                // print_r($isLogin);
                // die();
                if ($isLogin) {
                    $_SESSION['email'] = $email;
                    if ($isLogin['role'] == 1) {
                        redirect('Dashboard/index');
                    } else {
                        setMessage('success', 'Login Successful');
                        redirect('pages/index');
                    }
                    if ($isLogin == null) {
                        setMessage('error', 'Login Failed Please Try Again');
                        redirect('pages/login');
                    }


                    redirect('pages/login');
                }



                // print_r($isLogin);
                // exit;

                // if ($isLogin) {
                //     setMessage('id', base64_encode($isLogin['id']));
                //     $id = $isLogin['id'];
                //     $setLogin = $this->db->setLogin($id);
                //     redirect('pages/dashboard');
                // } else {
                //     setMessage('error', 'Login Fail!');
                //     redirect('pages/login');
                // }


                if ($isLogin == null) {
                    setMessage('error', 'Login Failed Please Try Again');
                    redirect('pages/login');
                }

                // if ($isLogin['role'] == 1) {
                //     redirect('Dashboard/index');
                // } else {
                //     setMessage('success', 'Login Successful');
                //     redirect('pages/index');
                // }




                // setMessage('success', 'Login Successful');
                // redirect('pages/index');

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
