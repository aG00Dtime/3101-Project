<?php

include "./inc/model/db-connection-class.php";
include './inc/model/view-meetings-class.php';
include './inc/controller/view-meetings-controller.php';

$getmeetings = new ViewMeetingsController();

$rows = $getmeetings->getPMeetings();
//https://getbootstrap.com/docs/4.1/content/tables/
// create table to add meetings
echo '

<h5> Publicly Available Meetings</h5>
<table class="table table-light table table-bordered table table-striped table-hover ">
<thead class="thead-light">
    <tr>
        <th scope="row">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
        <th scope="col">URL</th>
        <th scope="col">Created by</th>
    </tr>
</thead>
<tbody>';

// add data to tables
$row_count = 1;
foreach ($rows as $row) {
    echo "

    <tr>
    <td> {$row_count}</td>
    <td> {$row['meeting_name']}</td>
    <td> {$row['meeting_description']}</td>
    <td> {$row['meeting_time']}</td>
    <td> {$row['meeting_date']}</td>
    <td> <a href ='{$row['meeting_url']}' target='_blank'>Click Here</td>
    <td> {$row['meeting_user_email']}</td>
    </tr>
    ";

    $row_count++;
}

echo
'
</tbody>
</table>';
