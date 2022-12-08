<?php

class RsvpMeeting extends Dbc
{
    protected function UpdateRsvp($id, $email, $rsvp_status, $invite_id)
    {

        $statement = $this->connect()->prepare("UPDATE meeting_invites SET rsvp_status = ? WHERE meeting_id = ? AND user_email=? AND invite_id=?");

        if (!$statement->execute(array($rsvp_status, $id, $email, $invite_id))) {
            $statement = null;
            header("location : index?error=meetingnotupdated");
            exit();
        }

        $statement = null;
    }
}
