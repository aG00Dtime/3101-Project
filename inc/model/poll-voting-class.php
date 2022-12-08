<?php


class VoteOnPoll extends Dbc
{

    protected function UpdateVote($answer_id)
    {

        $statement = $this->connect()->prepare('UPDATE poll_answers SET votes = votes + 1 WHERE id = ?');

        if (!$statement->execute([$answer_id])) {
            $statement = null;
            header("location : index?error=voting-error");
            exit();
        }

        $statement = null;
    }
}
