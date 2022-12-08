<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    $meeting_id = $_GET['meeting_id'];



    //controller and class
    include "./inc/model/db-connection-class.php";
    include "./inc/model/get-poll-class.php";
    include "./inc/controller/get-poll-controller.php";


    $getMeetingPolls = new GetPollController($meeting_id, null);

    $polls = $getMeetingPolls->GetMeetingPolls();




    echo '
    <h5>Polls</h5>
    <table class="table table-light  table-bordered table-hover ">
    <thead>
        <tr>
            
            
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            
            <th scope="col">Options</th>
        
        </tr>
    </thead>
    <tbody>';

    if ($polls != null) {
        foreach ($polls as $poll) {

            echo "
    <tr>
    <td> {$poll['poll_title']}</td>
    <td> {$poll['poll_description']}</td>
    
    <td>
    <a class='btn btn-primary mb-2' href='vote-poll?poll_id={$poll['id']}'>Vote</a> 
    <a class='btn btn-danger mb-2' href='results-poll?results={$poll['id']}'>Results</a> 

    
    <a class='btn btn-success mb-2' href='share-poll?vote={$poll['id']}'>Share</a> 
    
    </td>
    
    ";
        }
    }
}
