<?php
const TABLE_NAME = 'tenant_reservation';
if (isset($_POST['btnReserve'])) {
    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
        $User = UserProperty::Load(Util::getParam('viewid'));
        $roomDetailID = Util::getParam('rdID');
        $tenantName = User::getName($userID);
        if (ifReserved($ownerID, $teabag, $conn) < 1) {
            $data = [
                'user_id'  =>  $userID,
                'tbl_property_id'  =>  $teabag,
                'room_details_id'  =>  $roomDetailID,
                'property_type'  =>  ($page == 1 ? 0 : 1),
                'owner_id'  =>  $ownerID,
                'date_reserved' => date('Y-m-d'),
                'date_expiration' => date('Y-m-d', strtotime(' + 3 days'))
            ];
            Dbcon::insert(TABLE_NAME, $data);
            SMS::send($tenantName, $tenantName.' has booked a reservation for '.$title, $User->getContact());
        } else {
            $where = [
                'user_id'  =>  $userID,
                'tbl_property_id'  =>  $teabag,
                'room_details_id'  =>  $roomDetailID,
                'owner_id'  =>  $ownerID
            ];
            Dbcon::delete(TABLE_NAME, $where);
            SMS::send($tenantName, $tenantName.' has cancelled reservation for '.$title, $User->getContact());
        }
    }
}

function ifReserved($ownerID, $tblPropertyID, $conn, $roomDetailsID = null)
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
        return Dbcon::fetch_num_rows($sql, $conn);
    }
}

function getExpiration($ownerID, $tblPropertyID, $conn, $roomDetailsID = null)
{
	if (isset($_SESSION['user_id'])) {
	    $sql = "
	        SELECT
	            CONCAT(date_reserved, ' - ', date_expiration) as data_expiration
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
	    $result = DBcon::execute($sql);
	    $data = DBcon::fetch_array($result);
	    return $data[0];
	}
}
//EOF