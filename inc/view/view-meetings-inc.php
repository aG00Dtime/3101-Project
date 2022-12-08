<?php


include "./inc/model/db-connection-class.php";
include './inc/model/view-meetings-class.php';
include './inc/controller/view-meetings-controller.php';


if (!isset($_SESSION['user'])) {
    exit;
}

$email = $_SESSION['user']['email'];

$getmeetings = new ViewMeetingsController($email);

$rows = $getmeetings->getUserMeetings();

// create table to add meetings
echo '

<h5> Your Meetings </h5>
<table class="table table-light  table-bordered table-hover ">
<thead>
    <tr>
        
        
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Visibility</th>
        <th scope="col">Manage</th>
        <th scope="col">Invites</th>
        <th scope="col">Details</th>
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
    <td> {$row['meeting_vis']}</td>
    <td>
    <a class='btn btn-primary mb-2'   href='edit-meeting?id={$row['meeting_id']}'> Update </a> 
    <a class='btn btn-danger mb-2' href='delete-meeting?id={$row['meeting_id']}' > Delete </a> 
    </td>

    <td>
    <a class='btn btn-success mb-2'  href='send-invite?id={$row['meeting_id']}' >Send</a> 
    </td>

    <td>
    <a class='btn btn-info mb-2'  href='view-meeting-details?id={$row['meeting_id']}' >View</a> 
    </td>

    <td>
    <a class='btn btn-primary mb-2'  href='polls?meeting_id={$row['meeting_id']}' >View</a> 
    <a class='btn btn-primary mb-2'  href='polls-create?meeting_id={$row['meeting_id']}' >Create</a> 
    </td>

    

    </tr>
    
    ";
}

echo
'
</tbody>
</table>';
