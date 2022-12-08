<?php

// alert
// inc login details
if (strpos($url, "error=incorrectlogindetails") || strpos($url, "error=inputempty")) {
    echo '
    <div class="alert alert-danger" role="alert">
            Something went wrong, Please check your credentials and try again...
    </div>';
    // meeting added
} else if (strpos($url, "meeting-added-success")) {

    echo '
    <div class="alert alert-success" role="alert">
            New meeting added!
    </div>';
    include_once './inc/view/view-meetings-inc.php';

    // email exists
} else if (strpos($url, "error=emailexists")) {

    echo '
    <div class="alert alert-danger" role="alert">
            An account already exists with that email, please try signing in.
    </div>';
    include_once './inc/view/view-meetings-inc.php';
}
// meeting edit
else if (strpos($url, "edit-meeting?error=none")) {

    echo '
    <div class="alert alert-success" role="alert">
            Meeting updated.
    </div>';

    include_once './inc/view/view-meetings-inc.php';
}
// delete meetings 
else if (strpos($url, "delete-meeting?id=")) {

    echo '
    <div class="alert alert-danger" role="alert">
            Meeting deleted.
    </div>';

    header("Refresh:1; url=view-meetings");

    // account creation
} else  if (strpos($url, "account-success")) {
    echo '
    <div class="alert alert-success" role="alert">
            Account created. Please continue to login.
    </div>';

    // password mismatch error
} else  if (strpos($url, "error=passwordmismatch")) {
    echo '
    <div class="alert alert-warning" role="alert">
            Passwords do not match, please try again.
    </div>';
    // 
} else  if (strpos($url, "invite-sent")) {
    echo '
    <div class="alert alert-success" role="alert">
            Invite Sent.
    </div>';
} else  if (strpos($url, "send-invite?error=meeting-is-private")) {
    echo '
    <div class="alert alert-warning" role="alert">
           Only registered users can be invited to private meetings.
    </div>';
} else  if (strpos($url, "rsvp-updated?status=success")) {
    echo '
    <div class="alert alert-success" role="alert">
           RSVP submitted.
    </div>';
} else  if (strpos($url, "poll-added")) {
    echo '
    <div class="alert alert-success" role="alert">
           New Poll Created.
    </div>';
}
