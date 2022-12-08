<?php


class EditMeeting extends Dbc
{

    protected function CheckMeeting($id, $useremail)
    {

        $statement = $this->connect()->prepare("SELECT * FROM meetings WHERE meeting_id = ? and meeting_user_email=?;");
        $statement->bindParam(1, $id, PDO::PARAM_STR);
        $statement->bindParam(2, $useremail, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location : index?error=meetingnotfound");
            exit();
        } else {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $statement = null;
    }

    protected function UpdateMeeting($id, $mname, $mdescr, $mtime, $mdate, $vis, $murl)
    {

        $statement = $this->connect()->prepare("UPDATE meetings SET meeting_name = ?,meeting_description=?,meeting_time=?,meeting_date=? ,meeting_vis=?,meeting_url=? WHERE meeting_id = ?");

        if (!$statement->execute(array($mname, $mdescr, $mtime, $mdate, $vis, $murl, $id))) {
            $statement = null;
            header("location : index?error=meetingnotupdated");
            exit();
        }

        $statement = null;
    }

    protected function DeleteUserMeeting($id)
    {
        $statement = $this->connect()->prepare("DELETE FROM meetings where meeting_id=?");

        $statement->bindParam(1, $id, PDO::PARAM_STR);

        if (!$statement->execute()) {
            $statement = null;
            header("location : index?error=meetingnotdeleted");
            exit();
        }

        $statement = null;
    }
}
