<?php
include 'Dbcon.php';
class Account
{
    public static function getReserveUser($ownerID)
    {
        $sql = "
            SELECT
                tp.title,
                tp.description,
                tp.location,
                u.user_fname,
                u.user_id,
                u.user_email,
                tr.owner_id,
                tr.tbl_property_id,
                tr.approve,
                tr.tenant_reservation_id
            FROM
                ".Dbcon::TABLE_TENANT_RESERVATION." tr
            INNER JOIN
                ".Dbcon::TABLE_USERS." u
            ON
                tr.user_id = u.user_id
            INNER JOIN
                ".Dbcon::TABLE_PROPERTY." tp
            ON
              tr.tbl_property_id =  tp.id
            WHERE
                tr.owner_id = {$ownerID}
        ";
        $data = DBcon::fetch_all_assoc($sql, 'user_id');
        return $data;
    }
}