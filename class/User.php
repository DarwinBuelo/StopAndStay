<?php

class User
{
    const TABLE_NAME = 'tbl_users';

    protected $userID;
    protected $userName;
    protected $userFname;
    protected $userContact;
    protected $userEmail;
    protected $confirm;
    protected $userType;
    protected $facebookID;

    public static function Load($chatID)
    {
        $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE chat_id = ".$chatID;
        $result = Dbcon::execute($sql);
        $data = DBcon::fetch_assoc($result);
        $new = new static();
        $this->userID = $data['user_id'];
        $this->userName = $data['user_name'];
        $this->user_fname = $data['user_fname'];
        /**
         * TODO: Complete this code
         */
    }

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

    public static function getName($userID)
    {
        $sql = "
            SELECT
                user_fname
            FROM
                ".static::TABLE_NAME."
            WHERE
                user_id = ".$userID;
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_array($result);
        return $data[0];
    }

    public static function getRole($userID)
    {
        $sql = "
            SELECT
                role
            FROM
                ".self::TABLE_NAME."
            WHERE
                user_id = {$userID}
        ";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_array($result);
        return $data[0];
    }

    public static function FindName($data)
    {
        $sql = "SELECT user_id from ".static::TABLE_NAME." WHERE user_fname='{$data}'";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_assoc($result);
        if (!empty($data)) {
            return $data['user_id'];
        } else {
            return false;
        }
    }
}
//EOF