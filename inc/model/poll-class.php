<?php

class CreatePoll extends Dbc
{
    // create a new poll
    protected function CreateNewPoll($meeting_id, $title, $description, $answer)


    {

        $pdo = $this->connect();

        $statement = $pdo->query("INSERT INTO poll (meeting_id,poll_title,poll_description) 
        VALUES ('$meeting_id','$title','$description')");

        if (!$statement == 1) {
            $statement = null;
            header("location : index?error=poll-not-created");
            exit();
        }


        // get last poll id
        $statement  = $pdo->query("SELECT LAST_INSERT_ID()");
        $poll_id = $statement->fetch();


        $answers = explode(PHP_EOL, $answer);

        // add each answer
        foreach ($answers as $answer) {

            $statement = $pdo->prepare('INSERT INTO poll_answers(poll_id,title) VALUES (?,?)');

            if (!$statement->execute(array($poll_id[0], $answer))) {
                $statement = null;
                header("location : index?error=poll-answer-not-added");
                exit();
            }

            $statement = null;
        }
    }
}
