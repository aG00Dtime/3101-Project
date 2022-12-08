<?php

function login()
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST' and isset($_POST['login-user'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        // controller
        include "./inc/model/db-connection-class.php";
        include "./inc/model/login-class.php";
        include "./inc/controller/login-controller.php";


        $login = new LoginController($email,  $password);

        // error handling
        $login->loginUser();


        // back to index
        header('Refresh: 0.1; URL = index.php?status=loggedin');
    }
}
