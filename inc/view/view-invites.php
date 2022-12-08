<?php


include "./inc/model/db-connection-class.php";
include './inc/model/view-meetings-class.php';
include './inc/controller/view-meetings-controller.php';


if (!isset($_SESSION['user'])) {
    exit();
}

$email = $_SESSION['user']['email'];
$getmeetings = new ViewMeetingsController($email);

$rows = $getmeetings->getInvMeetings();

// create table to add meetings

echo '
<h5>Meeting Invites</h5>
<table class="table table-light  table-bordered table-hover ">
<thead>
    <tr>
        
        
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
        <th scope="col">URL</th>
        <th scope="col">RSVP</th>
        <th scope="col">Polls</th>
    </tr>
</thead>
<tbody>';

// add data to tables
foreach ($rows as $row) {
    echo "
    <tr>
    <td> {$row['meeting_name']}</td>
    <td> {$row['meeting_description']}</td>
    <td> {$row['meeting_time']}</td>
    <td> {$row['meeting_date']}</td>

    ";


    if ($row['rsvp_status'] == "Accepted") {

        echo "<td> <a href='{$row['meeting_url']} ' target='_blank'> Click Here</a></td>";
    } else {

        echo "<td>Unavailable</td>";
    }




    if ($row['rsvp_status'] == "Waiting for reply.") {

        echo "
    <td>
    <a class='btn btn-primary mb-2'  href='rsvp-update?id={$row['meeting_id']}&inviteId={$row['invite_id']}&status=Accepted' >Accept</a> 
    <a class='btn btn-danger mb-2'  href='rsvp-update?id={$row['meeting_id']}&inviteId={$row['invite_id']}&status=Denied' >Deny</a> 
    </td>

    <td>
        <button class='btn btn-primary mb-2'' disabled >View</button> 
        </td>;
    

    </tr>

    ";
    } else if ($row['rsvp_status'] == "Accepted") {
        echo "<td class='text-success'> Accepted</td>";

        echo "<td>
        <a class='btn btn-primary mb-2'  href='polls?meeting_id={$row['meeting_id']}' >View</a> 
        </td>";
    } else if ($row['rsvp_status'] == "Denied") {
        echo "<td class='text-danger'

        > Denied </td>";
    }
}

echo
'
</tbody>
</table>';
