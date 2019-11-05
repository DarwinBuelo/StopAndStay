<?php
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
                tr.tenant_reservation_id,
                rd.room_type,
                rd.room_details_id
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
            INNER JOIN
                room_details rd
            ON
                rd.tbl_property_id = tp.id
            AND
                rd.room_details_id = tr.room_details_id
            WHERE
                tr.owner_id = {$ownerID}
            AND
                tp.property_type = 0
        ";
        $result = Dbcon::execute($sql);
        $data = DBcon::fetch_all_assoc($result, 'user_id');
        return $data;
    }

    public static function getReservedApartment($ownerID)
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
            AND
                tp.property_type = 1
        ";
        $result = Dbcon::execute($sql);
        $data = DBcon::fetch_all_assoc($result, 'user_id');
        return $data;
    }
}