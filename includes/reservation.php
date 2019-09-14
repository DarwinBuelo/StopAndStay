<?php
const TABLE_NAME = 'tenant_reservation';
if (isset($_POST['btnReserve'])) {

    if (isset($_SESSION['user_id'])) {
        if (ifReserved($ownerID, $teabag, $conn) < 1) {
            $data = [
                'user_id'  =>  $_SESSION['user_id'],
                'tbl_property_id'  =>  $teabag,
                'property_type'  =>  ($page == 1 ? 0 : 1),
                'owner_id'  =>  $ownerID
            ];
            Dbcon::insert(TABLE_NAME, $data);
        } else {
            $where = [
                'user_id'  =>  $_SESSION['user_id'],
                'tbl_property_id'  =>  $teabag,
                'owner_id'  =>  $ownerID
            ];
            Dbcon::delete(TABLE_NAME, $where);
        }
    }
}
function ifReserved($ownerID, $tblPropertyID, $conn)
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
        return Dbcon::fetch_num_rows($sql, $conn);
    }
}
//EOF