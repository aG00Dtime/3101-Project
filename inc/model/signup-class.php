
<?php

class Signup extends Dbc
{

    // insert info into db
    protected function addUser($fname, $lname, $email, $password)
    {

        $statement = $this->connect()->prepare('INSERT INTO account(first_name, last_name, email, passcode) VALUES(?,?,?,?);');

        //hash pw
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$statement->execute(array($fname, $lname, $email, $hashedpwd))) {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        }

        $statement = null;
    }

    // email check
    protected function userInfoCheck($email)
    {

        $statement = $this->connect()->prepare('SELECT email FROM account WHERE email = ? ;');

        $statement->bindParam(1, $email, PDO::PARAM_STR);

        if ($statement->execute()) {
            $results = '';
            if ($statement->rowCount() > 0) {
                $results = true;
            } else {
                $results = false;
            }

            return $results;
        } else {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        }
    }
}
