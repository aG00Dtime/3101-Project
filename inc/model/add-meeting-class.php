<?php

//https://www.w3schools.com/php/php_oop_classes_objects.asp
class AddMeeting extends Dbc
{

    protected function addMeeting($mname, $memail, $mdescr, $mtime, $mdate, $vis, $url)
    {

        $statement = $this->connect()->prepare("INSERT INTO meetings(meeting_name,meeting_user_email, meeting_description, meeting_time, meeting_date,meeting_vis,meeting_url) VALUES(?,?,?,?,?,?,?)");

        if (!$statement->execute(array($mname, $memail, $mdescr, $mtime, $mdate, $vis, $url))) {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        }

        $statement = null;
    }
}
