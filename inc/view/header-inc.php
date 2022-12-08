<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>onTime</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css//styles.css">  no longer using css file, only bootstrap stylings-->
    <link rel="icon" type="image/x-icon" href="./favicon.ico">



</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="index.php">onTIME</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="view-public-meetings"> View Public Meetings</a>
            </li>


            <!--Hide menu if logged in-->
            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="sign-up">Signup</a>
                </li>

            <?php else : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage Meetings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="add-meeting">Add Meeting</a>
                        <a class="dropdown-item" href="view-meetings">Your Meetings</a>
                        <a class="dropdown-item" href="meeting-invites">Meeting Invites</a>


                    </div>
                </li>

            <?php endif; ?>
            <!--Hide -->

        </ul>
    </div>
    <?php if (isset($_SESSION['user'])) : ?>

        <form class="form-inline" method="GET" action="<?php include_once './inc/view/logout-inc.php';
                                                        logout(); ?>">

            <p class="text-white m-2 "><?php echo  $_SESSION['user']['email'] ?></p>

            <button class="btn btn-infomy-2 my-sm-0" type="submit" name="logout-user">Logout</button>

        </form>


    <?php else : ?>
        <form class="form-inline" method="POST" action="<?php include_once './inc/view/login-inc.php';
                                                        login(); ?>">

            <input class="form-control mr-sm-2" type="email" name="email" id="email" placeholder="E-mail Address">

            <input class="form-control mr-sm-2" type="password" name="password" id="password" placeholder="Password">

            <button class="btn btn-info my-2 my-sm-0" type="submit" name="login-user">Login</button>

        </form>

    <?php endif; ?>
</nav>

<body>