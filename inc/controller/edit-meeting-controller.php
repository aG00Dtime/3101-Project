<?php

class EditMeetingController extends EditMeeting
{

    // meetings vars
    private $id;
    private $email;
    private $mname;
    private $mdescr;
    private $mtime;
    private $mdate;


    public function __construct($id, $email, $mname = false, $mdescr = false, $mtime = false, $mdate = false, $vis = false, $murl = false)
    {

        $this->id = $id;
        $this->email = $email;
        $this->mname = $mname;
        $this->mdescr = $mdescr;
        $this->mtime = $mtime;
        $this->mdate = $mdate;
        $this->vis = $vis;
        $this->url = $murl;
    }

    // run error checks and add the new meeting if everything is fine
    public function checkMeetingExists()
    {

        return $this->CheckMeeting($this->id, $this->email);
    }

    public function EditMeeting()
    {

        $this->UpdateMeeting($this->id, $this->mname, $this->mdescr, $this->mtime, $this->mdate, $this->vis, $this->url);
    }

    public function DeleteMeeting()
    {

        $this->DeleteUserMeeting($this->id, $this->mname, $this->mdescr, $this->mtime, $this->mdate, $this->vis, $this->url);
    }
}
