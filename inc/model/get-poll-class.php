<?php

class GetPollDetails extends Dbc
{
    // create a new poll
    protected function GetPoll($meeting_id)


    {
        $pdo = $this->connect();

        $statement = $pdo->prepare("SELECT * FROM poll where meeting_id = ?");


        $statement->bindParam(1, $meeting_id, PDO::PARAM_INT);


        if ($statement->execute()) {

            return   $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $statement = null;
    }

    protected function GetPollAnswers($poll_id)
    {
        $pdo = $this->connect();

        $statement = $pdo->prepare("SELECT id,title from poll_answers where poll_id=?");


        $statement->bindParam(1, $poll_id, PDO::PARAM_INT);


        if ($statement->execute()) {

            return   $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        $statement = null;
    }

    protected function GetPollTitle($poll_id)
    {
        $pdo = $this->connect();

        $statement = $pdo->prepare("SELECT * from poll where id=?");

        $statement->bindParam(1, $poll_id, PDO::PARAM_INT);


        if ($statement->execute()) {

            return   $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        $statement = null;
    }
}
