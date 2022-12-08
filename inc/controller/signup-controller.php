<?php

class SignupController extends Signup
{

    private $fname;
    private $lname;
    private $email;
    private $password;
    private $rpassword;

    public function __construct($fname, $lname, $email, $password, $rpassword)
    {

        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->rpassword = $rpassword;
    }

    // run error checks and add the new user if everything is fine
    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            header("location: sign-up?error=inputerror");
            exit();
        }

        if ($this->badEmail() == false) {
            header("location: sign-up?error=invalidemail");
            exit();
        }

        if ($this->emailExists() == false) {
            header("location: sign-up?error=emailexists");
            exit();
        }

        if ($this->passwordMatch() == false) {
            header("location: sign-up?error=passwordmismatch");
            exit();
        }

        $this->addUser($this->fname, $this->lname, $this->email, $this->password);
    }

    // check if submit form is missing any information
    private function emptyInput()
    {
        $error = '';

        if (empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->password) || empty($this->rpassword)) {

            $error = false;
        } else {
            $error = true;
        }

        return $error;
    }

    // validate email
    private function badEmail()
    {
        $error = '';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $error = false;
        } else {
            $error = true;
        }

        return $error;
    }

    // check if email already exists in db
    private function emailExists()
    {
        $error = '';
        if ($this->userInfoCheck($this->email)) {
            $error = false;
        } else {
            $error = true;
        }
        return $error;
    }

    // check if passwords match
    private function passwordMatch()
    { {
            $error = '';
            if ($this->password != $this->rpassword) {
                $error = false;
            } else {
                $error = true;
            }

            return $error;
        }
    }
}
