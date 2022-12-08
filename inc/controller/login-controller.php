<?php

class LoginController extends Login
{

    private $email;
    private $password;

    public function __construct($email, $password)
    {

        $this->email = $email;
        $this->password = $password;
    }

    // run error checks and add the new user if everything is fine
    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: index?error=inputempty");
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    // check if submit form is missing any information
    private function emptyInput()
    {
        $error = '';

        if (empty($this->email) || empty($this->password)) {

            $error = false;
        } else {
            $error = true;
        }

        return $error;
    }
}
