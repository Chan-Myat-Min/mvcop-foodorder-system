<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="<?= URLROOT; ?>/images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/index">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/categories">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/food">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/order">Order</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/addToCard"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/profile">Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/pages/login">Log out</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->