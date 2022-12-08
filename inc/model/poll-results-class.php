<?php


class PollResults extends Dbc
{

    public function PollVotes($poll_id)
    {

        $pdo = $this->connect();

        $statement = $pdo->prepare("SELECT * FROM poll_answers where poll_id = ? ORDER BY votes desc");

        if (!$statement->execute([$poll_id])) {
            $statement = null;
            header("location : index?error=query-failed");
            exit();
        }

        $answers = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $answers;
    }

    public function GetTitle($poll_id)
    {

        $pdo = $this->connect();

        $statement = $pdo->prepare("SELECT poll_title FROM poll where id = ?");

        if (!$statement->execute([$poll_id])) {
            $statement = null;
            header("location : index?error=query-failed");
            exit();
        }
        $answers = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $answers;
    }
}
