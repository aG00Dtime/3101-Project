<?php

function update_meeting()

{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['update-meeting'])) {


        // includes to update meeting
        include "./inc/model/db-connection-class.php";
        include "./inc/model/edit-meeting-class.php";
        include "./inc/controller/edit-meeting-controller.php";

        $id = $_POST['id'];
        $email = $_SERVER['user']['email'];
        $mname = $_POST['mname'];
        $mdescr = $_POST['mdescr'];
        $mtime = $_POST['mtime'];
        $mdate = $_POST['mdate'];
        $murl = $_POST['murl'];
        $mvis = $_POST['flexRadioDefault'];

        $update_meeting = new EditMeetingController($id, $email, $mname, $mdescr, $mtime, $mdate, $mvis, $murl);

        $update_meeting->EditMeeting();

        header("location: edit-meeting?error=none");
    }
}
