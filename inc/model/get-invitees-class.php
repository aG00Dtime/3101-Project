<?php


class GetInvitees extends Dbc
{

    protected function getMinvitees($id)
    {

        $statement = $this->connect()->prepare("SELECT * FROM meeting_invites WHERE meeting_id = ?;");
        $statement->bindParam(1, $id, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location : ../index.php?error=queryfailed");
            exit();
        } else {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $statement = null;
    }
}
