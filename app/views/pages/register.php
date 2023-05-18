<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">

                <h2 class="card-text"> Sign Up</h2>
                <p class="card-text" aria-placeholder="UserName">Please enter your username,email and password</p>
            </div>

            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/Users/register" method="POST">
                    <div class="form-group">
                        <label for="name">UserName<sub>*</sub></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name....." value="">
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="form-group">
                        <label for="contact">Phone Number<sub>*</sub></label>
                        <input type="text" name="phone_number" placeholder="E.g. 09xxxxxxxxx" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="form-group">
                        <label for="email">Email<sub>*</sub></label>
                        <input type="text" name="email" class="form-control form-control-lg" placeholder="E.g. kotheinmaung96@gmail.com" value="">
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password<sub>*</sub></label>
                        <input type="password" name="password" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"> </span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" name="submit" class="btn btn-success btn-block pull-left" value="SignUp">
                            </div>
                            <div class="col">
                                <b class="pull-right">You Have Account!</b>
                                <a href="<?php echo URLROOT; ?>/pages/login" class="blue btn-block left">Login</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/fontawesome.min.css">

<?php

// if (isset($_POST['submit']))
//  {
//     echo $name = $_POST['name'];
//     echo $name = $_POST['phone_number'];
//     echo $email  = $_POST['email'];
//     echo $password =$_POST['password'];

   
// }
?>