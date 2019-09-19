<?php

class Chat
{
    const TABLE = "chats";

    protected $chatID;
    protected $senderID;
    protected $receiveID;
    protected $message;
    protected $timeSent;

    public static function Load($id)
    {
        $sql = "SELECT * FROM ".self::TABLE;
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_assoc($data);
        if (!empty($data)) {
            $new = new static();
            $new->setChatID($data['chat_id']);
            $new->setSenderID($data['sender_id']);
            $new->setReceiverID($data['receiver_id']);
            $new->setMessage($data['message']);
            $new->setTimeSent($data['time_sent']);
            return $new;
        } else {
            return false;
        }
    }

    public static function getChatsForMe($receiver,$key ='sender_id')
    {
        $return = [];
        $sql = "SELECT
                    chat_id
                FROM "
                .self::TABLE.
              " WHERE 
                    receiver_id = {$receiver} 
               ORDER BY
                    time_sent";
        $result = DBcon::execute('$sql');
        $data =  DBcon::fetch_all_assoc($result);
        if(!empty($data)){
            foreach ($data as $item){
                $return[$item[$key]] = static::Load($item['chaht_id']);
            }
        }
        return $return;
    }

    public function submit(){
        
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
}