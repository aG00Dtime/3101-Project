<?php



function addMeeting()
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST' and isset($_POST['add-meeting'])) {


        session_start();

        $memail = $_SESSION['user']['email'];
        $mname = $_POST['mname'];
        $mdescr = $_POST['mdescr'];
        $mtime = $_POST['mtime'];
        $mdate = $_POST['mdate'];
        $vis = $_POST['flexRadioDefault'];
        $murl = $_POST['murl'];

        // controller   
        include "./inc/model/db-connection-class.php";
        include "./inc/model/add-meeting-class.php";
        include "./inc/controller/add-meeting-controller.php";

        $newmeeting = new AddMeetingController($mname, $memail, $mdescr, $mtime, $mdate, $vis, $murl);

        // error handling
        $newmeeting->addNewMeeting();


        // back to index
        header("location: meeting-added-success");
    }
}
