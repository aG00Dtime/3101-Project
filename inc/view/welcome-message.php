<?php

if (isset($_SESSION['user'])) {

    $user = ucfirst($_SESSION['user']['first_name']);

    echo "


    <div  style='margin: auto;width: 50%;
	text-align: center;
	padding-top: 5%;'>

        <h1> Welcome {$user}. </h1>
        <p>Manage meetings or view pending meeting invites.</p>
       

    </div>
    
    ";
} else {

    echo "<div  style='margin: auto;width: 50%;
	text-align: center;
	padding-top: 5%;'>
    <h1> Welcome to onTime. </h1>
    <p>Sign up or Login to manage meeting schedule.</p>
</div>";
}
