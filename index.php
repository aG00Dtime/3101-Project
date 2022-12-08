<!--header-->
<?php
include_once './inc/view/header-inc.php';

?>
<!--header-->

<main class='index-page-view' style="padding: 2rem; width: 100%">

    <?php

    $url = $_SERVER["REQUEST_URI"];

    // error alerts
    include_once './inc/view/errors.php';

    // adjust content based on url
    // display simple welcome message to the site 
    if (strpos($url, "index.php")) {
        include_once "./inc/view/welcome-message.php";

        // sign up page
    } else if (strpos($url, "sign-up")) {
        include_once './inc/view/signup-form-inc.php';

        // add new meetings
    } else if (strpos($url, "add-meeting")) {
        include_once './inc/view/add-meeting-form.php';

        // view user added meetings with update and delete option
    } else if (strpos($url, "view-meetings")) {
        include_once './inc/view/view-meetings-inc.php';

        // meeting that are public
    } else if (strpos($url, "view-public-meetings")) {
        include_once './inc/view/view-public-meetings-inc.php';

        // load the meeting update form
    } else if (strpos($url, "edit-meeting?id=")) {
        include_once './inc/view/edit-meeting-form.php';

        // delete user meeting redirect
    } else if (strpos($url, "delete-meeting?id=")) {
        include_once './inc/view/delete-meeting-inc.php';
        // meeting invites
    } else if (strpos($url, "meeting-invites")) {
        include_once './inc/view/view-invites.php';
        //view meeting details // includes rsvp list
    } else if (strpos($url, "view-meeting-details")) {
        include_once './inc/view/view-meeting-details.php';
        // 
    } else if (strpos($url, "send-invite?id=")) {
        include_once './inc/view/send-invites-form.php';
        //rsvp
    } else if (strpos($url, "rsvp-update?id=")) {
        include_once './inc/view/rsvp-inc.php';
        //
    } else  if (strpos($url, "rsvp-updated?status=success")) {

        include_once "./inc/view/view-invites.php";
        // create poll
    } else  if (strpos($url, "polls-create?meeting_id=")) {

        include_once "./inc/view/create-poll-form.php";
        //
    } else  if (strpos($url, "polls?meeting_id=")) {

        include_once "./inc/view/view-polls.php";
        //
    } else  if (strpos($url, "vote-poll?poll_id=")) {

        include_once "./inc/view/vote-poll.php";
    }
    // results page
    else  if (strpos($url, "vote-success?results=") || strpos($url, "results-poll?results=")) {

        include_once "./inc/view/poll-results.php";
    }
    // share poll
    else  if (strpos($url, "share-poll?")) {

        include_once "./inc/view/share-poll.php";
    }
    //  poll added
    else  if (strpos($url, "poll-added")) {

        include_once "./inc/view/view-meetings-inc.php";
    }



    ?>

</main>


<?php include_once './inc/view/footer-inc.php' ?>