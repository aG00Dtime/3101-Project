<?php


// create poll from form inputs
function createPoll()
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST' and isset($_POST['create-poll'])) {

        // grab data from poll form
        $meeting_id = $_POST['meeting_id'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $answers = $_POST['poll-answers'];

        // controller   
        include "./inc/model/db-connection-class.php";
        include "./inc/model/poll-class.php";
        include "./inc/controller/poll-controller.php";

        $NewPoll = new PollController($meeting_id, $title, $desc, $answers);

        // error handling
        $NewPoll->CreatePoll();


        // back to index
        header("location: poll-added");
    }
}
