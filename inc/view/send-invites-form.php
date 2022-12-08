<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // make sure the user can only view their own meetings
    $user = $_SESSION['user']['email'];

    // meeting id from meetings page
    $id = $_GET['id'];

    // controller
    include "./inc/model/db-connection-class.php";
    include "./inc/model/edit-meeting-class.php";
    include "./inc/controller/edit-meeting-controller.php";



    $meeting_owner = new EditMeetingController($id, $user);

    // check if meeting exists and return data
    $meeting_owner = $meeting_owner->checkMeetingExists();

    if (!$meeting_owner) {

        echo "Error";
        exit();
    }
}

?>

<div class="container-fluid" style="position: absolute; top: 30%">
    <div class="row">

        <div class="col-4 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Invite a user to this meeting
                    </h5>
                    <div class="card-text">
                        <form method="POST" action="<?php include './inc/view/send-invite-inc.php';
                                                    sendInvite(); ?>">
                            <div class="mb-2">

                                <input type="hidden" name="meeting_id" value="<?php echo $id ?>">

                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name='invite-user'>Send Invite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>