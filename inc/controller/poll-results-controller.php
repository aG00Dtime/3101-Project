<?php

class PollResultsController extends PollResults
{


    private $poll_id;


    public function __construct($poll_id)
    {

        $this->poll_id = $poll_id;
    }
    public function GetResults()
    {

        return $this->PollVotes($this->poll_id);
    }

    public function GetPollTitle()
    {

        return $this->GetTitle($this->poll_id);
    }
}
