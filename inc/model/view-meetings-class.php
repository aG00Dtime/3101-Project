<?php


class ViewMeetings extends Dbc
{

    protected function getMeetings($email = false)
    {

        $statement = $this->connect()->prepare("SELECT * FROM meetings WHERE meeting_user_email = ?;");
        $statement->bindParam(1, $email, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        } else {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $statement = null;
    }

    protected function GetInvitedMeetings($email = false)
    {

        $statement = $this->connect()->prepare("
            Select 
            meetings.meeting_id, 
            meetings.meeting_user_email,
            meetings.meeting_name, 
            meetings.meeting_description, 
            meetings.meeting_time, 
            meetings.meeting_date, 
            meetings.meeting_url, 
            meeting_invites.rsvp_status,
            meeting_invites.invite_id
            FROM meetings 
            INNER JOIN meeting_invites ON meetings.meeting_id= meeting_invites.meeting_id 
            WHERE meeting_invites.user_email=?;");

        $statement->bindParam(1, $email, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        } else {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $statement = null;
    }

    protected function GetPublicMeetings()
    {

        $statement = $this->connect()->prepare("SELECT * FROM meetings WHERE meeting_vis ='public';");


        if (!$statement->execute()) {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        } else {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $statement = null;
    }
}
