<?php

class PollVoteController extends VoteOnPoll
{
    private $answer_id;


    public function __construct($answer_id)
    {

        $this->answer_id = $answer_id;
    }
    public function UpdatePollVote()
    {

        $this->UpdateVote($this->answer_id);
    }
}
