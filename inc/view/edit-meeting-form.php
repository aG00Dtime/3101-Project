<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $mname = $mdescr = $mtime = $mdate = null;

    // make sure the user can only view their own meetings
    $user = $_SESSION['user']['email'];

    // meeting id from meetings page
    $id = $_GET['id'];

    // controller
    include "./inc/model/db-connection-class.php";
    include "./inc/model/edit-meeting-class.php";
    include "./inc/controller/edit-meeting-controller.php";

    $meeting_updater = new EditMeetingController($id, $user);

    // check if meeting exists and return data
    $meeting_details = $meeting_updater->checkMeetingExists();

    if ($meeting_details) {
        $mname = $meeting_details[0]['meeting_name'];
        $mdescr = $meeting_details[0]['meeting_description'];
        $mtime = $meeting_details[0]['meeting_time'];
        $mdate = $meeting_details[0]['meeting_date'];
        $murl = $meeting_details[0]['meeting_url'];
    }
}
?>

<div class="container-fluid" style="position: absolute; top: 15%">
    <div class="row">
        <div class="col-4 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit Meeting details
                    </h5>
                    <div class="card-text">
                        <form method="POST" action="<?php include './inc/view/edit-meeting-inc.php';
                                                    update_meeting() ?>">

                            <input type="hidden" name='id' value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label for="mname" class="form-label">Meeting Name</label>

                                <input type="text" class="form-control" maxlength="30" value="<?php echo $mname ?>" name="mname" id="mname" required>
                            </div>

                            <div class="mb-3 ">
                                <label for="mdescr" class="form-label">Description</label>
                                <input type="text" class="form-control " maxlength="200" value="<?php echo $mdescr ?>" name="mdescr" id="mdescr" required>
                            </div>

                            <div class="mb-3 ">
                                <label for="mtime" class="form-label">Time</label>
                                <input type="time" class="form-control" value="<?php echo $mtime ?>" name="mtime" id="mtime" required>
                            </div>

                            <div class="mb-3">
                                <label for="mdate" class="form-label">Date</label>
                                <input type="date" class="form-control" value="<?php echo $mdate ?>" name="mdate" id="mdate" required>
                            </div>

                            <div class="mb-3">
                                <label for="murl" class="form-label">URL</label>
                                <input type="url" class="form-control" maxlength="200" value="<?php echo $murl ?>" name="murl" id="murl" required>
                            </div>

                            <label>Select Meeting Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="PRIVATE" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Private Meeting
                                </label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" value="PUBLIC" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Public Meeting
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary mb-3" name="update-meeting">Update Meeting</button>

                            <a class='btn btn-danger mb-3' href='view-meetings'> Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>