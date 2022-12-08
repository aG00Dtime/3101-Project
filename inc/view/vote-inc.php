<?php

function voteOnPoll()
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST' and isset($_POST['vote'])) {

        $selectedAnswer = $_POST['poll_answer'];
        $poll_id = $_POST['poll_id'];

        include "./inc/model/db-connection-class.php";
        include "./inc/model/poll-voting-class.php";
        include "./inc/controller/poll-voting-controller.php";

        $updateVote = new PollVoteController($selectedAnswer);

        $updateVote->UpdatePollVote();

        header("location:vote-success?results={$poll_id}");
    }
}
