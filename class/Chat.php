<?php

class Chat
{
    const TABLE = "chats";

    protected $chatID;
    protected $senderID;
    protected $receiveID;
    protected $message;
    protected $timeSent;
    protected $status;

    public static function Load($chatID)
    {
        $sql = "SELECT * FROM ".self::TABLE." WHERE chat_id=".$chatID;
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_assoc($result);
        if (!empty($data)) {
            $new = new static();
            $new->setChatID($data['chat_id']);
            $new->setSenderID($data['sender_id']);
            $new->setReceiverID($data['receiver_id']);
            $new->setMessage($data['message']);
            $new->setTimeSent($data['time_sent']);
            $new->setStatus($data['status']);
            return $new;
        } else {
            return false;
        }
    }
    /*
     * get the chats for the user
     */

    public static function getChatsForMe($userID, $key = 'sender_id')
    {
        $return = [];
        $sql = "SELECT
                    chat_id,
                    sender_id,
                    receiver_id,
                    time_sent,
                    status
                FROM "
            .self::TABLE.
            " WHERE
                    sender_id ={$userID}
              OR
                    receiver_id = {$userID}
               ORDER BY
                    time_sent";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_all_assoc($result);

        if (!empty($data)) {
            foreach ($data as $item) {
                if ($item[$key] == $userID) {
                    $return[$item['receiver_id']][$item['chat_id']] = static::Load(intval($item['chat_id']));
                } else {
                    $return[$item[$key]][$item['chat_id']] = static::Load(intval($item['chat_id']));
                }
            }
        }
        return $return;
    }

    public static function getMyChatMates($currentUser)
    {
        // will get all the id of the user which chatted me or I chatted you
        $sql = "SELECT * FROM chats WHERE sender_id = {$currentUser} OR recevier ={$currentUser}";

        //segreate the result
    }

    public static function retreiveMessage($currentUser, $anyuser)
    {

        // test
        $sql = "SELECT chat_id FROM chats WHERE (receiver_id = {$currentUser} AND sender_id = {$anyuser}) OR (receiver_id = {$anyuser} AND sender_id = {$currentUser})";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_all_assoc($result);

        Util::debug($data);
    }

    public function submit()
    {
        $data = [
            'sender_id' => $this->getSenderID(),
            'receiver_id' => $this->getReceiverID(),
            'message' => $this->getMessage()
        ];
    }

    public function getChatID()
    {
        return $this->chatID;
    }

    public function setChatID($id)
    {
        $this->chatID = $id;
    }

    public function getSenderID()
    {
        return $this->senderID;
    }

    public function setSenderID($id)
    {
        $this->senderID = $id;
    }

    public function getReceiverID()
    {
        return $this->receiveID;
    }

    public function setReceiverID($id)
    {
        $this->receiveID = $id;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getTimeSent()
    {
        return $this->timeSent;
    }

    public function setTimeSent($time)
    {
        $this->timeSent = $time;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}