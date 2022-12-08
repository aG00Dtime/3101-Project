<?php

class GetInviteesController extends GetInvitees
{

    private $id;

    public function __construct($id)
    {

        $this->id = $id;
    }

    // run error checks and add the new user if everything is fine
    public function getInvites()
    {

        return $this->getMinvitees($this->id);
    }
}
