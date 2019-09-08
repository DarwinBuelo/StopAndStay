<?php
include 'Dbcon.php';
class User
{
    const TABLE_NAME = 'tbl_users';

    public static function getEmailAddress($userID)
    {
        $sql = "
            SELECT
                user_email
            FROM
                ".static::TABLE_NAME."
            WHERE
                user_id = ".$userID;
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_array($result);
        return $data[0];
    }
}