<?php

function register_user()
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST' and isset($_POST['register-user'])) {

        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];


        // controller
        include "./inc/model/db-connection-class.php";
        include "./inc/model/signup-class.php";
        include "./inc/controller/signup-controller.php";


        $signup = new SignupController($fname, $lname, $email, $password, $rpassword);

        // error handling
        $signup->signUpUser();


        // back to index
        header("location: account-success");
    }
}
