<?php {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $id = $email = $status = null;


        // make sure the user can only view their own meetings
        $user = $_SESSION['user']['email'];

        // meeting id from meetings page
        $id = $_GET['id'];
        $status = $_GET['status'];
        $invite_id = $_GET['inviteId'];

        // controller
        include "./inc/model/db-connection-class.php";
        include "./inc/model/rsvp-class.php";
        include "./inc/controller/rsvp-controller.php";

        $updateRsvp = new RsvpController($id, $user, $status, $invite_id);

        // check if meeting exists and return data
        $updateRsvp->RsvpMeeting();

        header("location:rsvp-updated?status=success");
    }
}
