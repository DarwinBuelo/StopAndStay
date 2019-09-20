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

    public static function Load($id)
    {
        $sql = "SELECT * FROM ".self::TABLE;
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
                $return[$item[$key]] = static::Load($item['chat_id']);
            }
        }
        return $return;
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
        $this->status = $status ;
    }
}