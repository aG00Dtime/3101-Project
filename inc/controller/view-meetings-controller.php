<?php

class ViewMeetingsController extends ViewMeetings
{

    private $email;

    public function __construct($email = false)
    {

        $this->email = $email;
    }

    // run error checks and add the new user if everything is fine
    public function getUserMeetings()
    {

        return $this->getMeetings($this->email);
    }

    public function getPMeetings()
    {
        return $this->GetPublicMeetings();
    }

    // get meetings the user is invited to
    public function getInvMeetings()
    {
        return $this->GetInvitedMeetings($this->email);
    }
}
