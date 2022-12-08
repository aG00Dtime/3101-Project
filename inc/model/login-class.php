<?php

class Login extends Dbc
{
    protected function getUser($email, $password)
    {
        $statement = $this->connect()->prepare('SELECT passcode FROM account WHERE email = ? ;');
        $statement->bindParam(1, $email, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location: login?error=query");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            header("location: login?error=incorrectlogindetails");
            exit();
        }


        $hashedpw = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkpw = password_verify($password, $hashedpw[0]['passcode']);

        if ($checkpw == true) {
            $statement = $this->connect()->prepare('SELECT * FROM account WHERE email = ? LIMIT 1;');

            $statement->bindParam(1, $email, PDO::PARAM_STR);

            if (!$statement->execute()) {
                $statement = null;
                header("location: login?error=query");
                exit();
            }

            if ($statement->rowCount() == 0) {
                $statement = null;
                header("location: login?error=query");
                exit();
            }

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            // create session with user variables
            session_start();
            unset($user["passcode"]);

            $_SESSION['user'] = $user;
        } else {
            $statement = null;
            header("location: login?error=incorrectlogindetails");
            exit();
        }



        // end
        $statement = null;
    }
}
