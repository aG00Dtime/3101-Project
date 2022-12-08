<?php


class GetPollController extends GetPollDetails
{

    private $meeting_id;
    private $poll_id;

    public function __construct($meeting_id, $poll_id)
    {

        $this->meeting_id = $meeting_id;
        $this->poll_id = $poll_id;
    }

    // run error checks and add the new user if everything is fine
    public function GetMeetingPolls()
    {

        return $this->GetPoll($this->meeting_id);
    }

    // get answers
    public function GetPollAns()
    {

        return $this->GetPollAnswers($this->poll_id);
    }
    // get poll title
    public function GetPollDet()
    {
        return $this->GetPollTitle($this->poll_id);
    }

    //get ownser of poll


}
