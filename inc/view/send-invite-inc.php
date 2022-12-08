<?php

function sendInvite()
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST' and isset($_POST['invite-user'])) {

        $email = $_POST['email'];

        $meeting_id = $_POST['meeting_id'];

        $rsvp = "Waiting for reply.";


        // controller
        include "./inc/model/db-connection-class.php";
        include "./inc/model/send-meeting-invites-class.php";
        include "./inc/controller/send-invite-controller.php";

        $newinvite = new SendInviteController($meeting_id, $email, $rsvp);

        // error handling
        $newinvite->SendInviteToUser();


        // back to index
        header("location: send-invite?id={$meeting_id} & invite-sent");
    }
}
