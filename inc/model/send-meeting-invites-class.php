<?php

class SendMeetingInvite extends Dbc
{

    // needs to check if meeting is private of public then add the user
    protected function SendMeetingInvite($id, $email, $rsvp)
    {


        $statement = $this->connect()->prepare('INSERT INTO meeting_invites(meeting_id,user_email,rsvp_status)
        VALUES (?, ?, ?);');

        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $email, PDO::PARAM_STR);
        $statement->bindParam(3, $rsvp, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location: invite?error=failedinvite");
            exit();
        }

        $statement = null;
    }

    protected function CheckMeetingVis($id)
    {

        $statement = $this->connect()->prepare('SELECT meeting_vis FROM meetings WHERE meeting_id=?');
        $statement->bindParam(1, $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $results = '';
            $meeting = $statement->fetchAll(PDO::FETCH_ASSOC);
            // check if meeting is public
            if ($meeting[0]['meeting_vis'] == "PUBLIC") {
                $results = true;
            } else {
                $results = false;
            }
            return $results;
        } else {
            $statement = null;
            header("location : index.php?error=queryfailed");
            exit();
        }


        $statement = null;
    }

    // email check
    protected function CheckForEmail($email)
    {

        $statement = $this->connect()->prepare('SELECT email FROM account WHERE email = ? ;');

        $statement->bindParam(1, $email, PDO::PARAM_STR);

        if ($statement->execute()) {
            $results = '';
            if ($statement->rowCount() > 0) {
                $results = true;
            } else {
                $results = false;
            }

            return $results;
        } else {
            $statement = null;
            header("location : index.php?error=queryfailed");
            exit();
        }
    }
}
