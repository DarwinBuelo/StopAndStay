<?php

class User
{
    const TABLE_NAME = 'tbl_users';
    const TABLE_TENANT_RESERVATION = 'tenant_reservation';

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

    public static function getFacebookID($userID)
    {
        $sql = "
            SELECT
                facebook_id
            FROM
                ".self::TABLE_NAME."
            WHERE
                user_id = {$userID}
        ";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_array($result);
        return $data[0];
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

    public static function ifApproved($userID, $propertyID)
    {
        $sql = "
            SELECT
                approve
            FROM
                ".self::TABLE_TENANT_RESERVATION."
            WHERE
                user_id = {$userID}
            AND
                tbl_property_id = {$propertyID}
        ";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_array($result);
        if (!empty($data[0])) {
            return true;
        }
        return false;
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

    public static function ifReserved($ownerID, $tblPropertyID, $roomDetailsID = null)
    {
        if (isset($_SESSION['user_id'])) {
            $sql = "
            SELECT
                user_id
            FROM
                tenant_reservation
            WHERE
                user_id = {$_SESSION['user_id']}
            AND
                owner_id = {$ownerID}
            AND
                tbl_property_id = {$tblPropertyID}
        ";
            if (!empty($roomDetailsID)) {
                $sql .= "
                AND
                    room_details_id = {$roomDetailsID}
            ";
            }
            return Dbcon::fetch_num_rows($sql);
        }
    }
}
//EOF