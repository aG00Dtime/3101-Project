<?php


class PollController extends CreatePoll
{

    private $meeting_id;
    private $title;
    private $description;
    private $answer;

    public function __construct($meeting_id, $title, $description, $answer)
    {

        $this->meeting_id = $meeting_id;
        $this->title = $title;
        $this->description = $description;
        $this->answer = $answer;
    }
    public function CreatePoll()
    {

        $this->CreateNewPoll($this->meeting_id, $this->title, $this->description, $this->answer);
    }
}
