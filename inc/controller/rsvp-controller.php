<?php


class RsvpController extends RsvpMeeting
{

    private $id;
    private $user_email;
    private $rsvp_status;
    private $invite_id;

    public function __construct($id, $email, $rsvp_str, $invite_id)
    {

        $this->id = $id;
        $this->rsvp_status = $rsvp_str;
        $this->user_email = $email;
        $this->invite_id = $invite_id;
    }


    public function RsvpMeeting()
    {
        $this->UpdateRsvp($this->id, $this->user_email, $this->rsvp_status, $this->invite_id);
    }
}
