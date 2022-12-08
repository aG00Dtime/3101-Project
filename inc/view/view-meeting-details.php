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
    include "./inc/model/get-invitees-class.php";
    include "./inc/controller/edit-meeting-controller.php";
    include "./inc/controller/get-invitees-controller.php";

    $meeting_updater = new EditMeetingController($id, $user);
    $getmeetinginvites = new GetInviteesController($id);

    // check if meeting exists and return data
    $meeting_details = $meeting_updater->checkMeetingExists();
    $getmeetinginvites = $getmeetinginvites->getInvites();

    if ($meeting_details) {
        $mname = $meeting_details[0]['meeting_name'];
        $mdescr = $meeting_details[0]['meeting_description'];
        $mtime = $meeting_details[0]['meeting_time'];
        $mdate = $meeting_details[0]['meeting_date'];
        $murl = $meeting_details[0]['meeting_url'];
    }
}

?>

<div class="card mb-3 mx-auto" style=" max-width: 40rem; ">
    <div class="card-header">

        <h5>Meeting Details</h5>
    </div>
    <div class="card-body">

        <h6 class="card-title">Meeting Name </h6>
        <p class="card-text"><?php echo $mname ?></p>
        <hr>
        <h6 class="card-title">Description</h6>
        <p class="card-text"><?php echo $mdescr ?></p>
        <hr>
        <h6 class="card-title">Time</h6>
        <p><?php echo $mtime ?></p>
        <hr>
        <h6 class="card-title">Date</h6>
        <p><?php echo $mdate ?></p>
        <hr>

        <h6 class="card-title">URL</h6>
        <a href="<?php echo $murl ?>"><?php echo $murl ?></a>
        <hr>
        <h5 class="mb-3">Invitees</h5>



        <table class="table table-bordered table-hover table-sm table-striped mb-3">
            <thead>
                <tr>
                    <th scope=" col">Email</th>
                    <th scope="col">RSVP Status</th>
                </tr>
            </thead>

            <tbody>


                <?php if ($getmeetinginvites) {

                    foreach ($getmeetinginvites as $row)


                        echo  "

                            <tr>
                            <!--email-->

                            <td class='font-weight-bold'> {$row['user_email']} </td>

                            <!--rsvp status-->
                            <td class='font-weight-bold'>{$row['rsvp_status']}</td>

                            </tr>";
                }

                ?>

            </tbody>
        </table>

    </div>

</div>