<?php
//https://www.w3schools.com/php/php_oop_interfaces.asp

class AddMeetingController extends AddMeeting
{

    private $mname;
    private $memail;
    private $mdescr;
    private $mtime;
    private $mdate;

    public function __construct($mname, $memail, $mdescr, $mtime, $mdate, $vis, $url)
    {

        $this->mname = $mname;
        $this->memail = $memail;
        $this->mdescr = $mdescr;
        $this->mtime = $mtime;
        $this->mdate = $mdate;
        $this->vis = $vis;
        $this->url = $url;
    }

    // run error checks and add the new meeting if everything is fine
    public function addNewMeeting()
    {
        if ($this->emptyInput() == false) {
            header("location: add-meeting?error=inputerror");
            exit();
        }

        $this->addMeeting($this->mname, $this->memail, $this->mdescr, $this->mtime, $this->mdate, $this->vis, $this->url);
    }

    // check if submit form is missing any information
    private function emptyInput()
    {
        $error = '';

        if (empty($this->mname) || empty($this->memail) || empty($this->mdescr) || empty($this->mtime) || empty($this->mdate) || (empty($this->vis)) || (empty($this->url))) {

            $error = false;
        } else {
            $error = true;
        }

        return $error;
    }
}
