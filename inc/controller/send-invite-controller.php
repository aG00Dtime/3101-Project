<?php

class SendInviteController extends SendMeetingInvite
{

    private $id;
    private $email;
    private $rsvp;

    public function __construct($id, $email, $rsvp)
    {

        $this->id = $id;
        $this->email = $email;
        $this->rsvp = $rsvp;
    }

    // run error checks and add the new user if everything is fine
    public function SendInviteToUser()
    {

        $public = $this->CheckVis();
        $email_exists = $this->CheckUserEmail();

        // check if email is private and the account exists

        if ($public) {
            $this->SendMeetingInvite($this->id, $this->email, $this->rsvp);
        } else if (!$public and $email_exists) {
            $this->SendMeetingInvite($this->id, $this->email, $this->rsvp);
        } else {
            header("location: send-invite?error=meeting-is-private");
            exit();
        }
    }
    // check if meeting is public
    public function CheckVis()
    {
        return $this->CheckMeetingVis($this->id);
    }
    // check if user email exists in the database for private meetings
    public function CheckUserEmail()
    {
        return $this->CheckForEmail($this->email);
    }
}
