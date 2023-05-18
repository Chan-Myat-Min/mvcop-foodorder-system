<?php session_start(); ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">

                <h2 class="card-text">User login</h2>
                <p class="card-text">Please enter your username and password</p>
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo URLROOT; ?>/Users/login">
                    <div class="form-group">
                        <label for="email">Email<sub>*</sub></label>
                        <input type="email" placeholder="Enter Your Email" name="email" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password<sub>*</sub></label>
                        <input type="password" placeholder="Enter Your Password" name="password" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"> </span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-success btn-block pull-left" value="Login">
                            </div>
                            <div class="col">
                                <b class="pull-right">If You Have No Account!</b>
                                <a href="<?php echo URLROOT; ?>/pages/register" class="btn btn-blue btn-btn-block pull-right">Sign Up</a>
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