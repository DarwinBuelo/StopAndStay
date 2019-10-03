<?php

/**
 * Will handle the user properties table
 */
class UserPropertiesInterface
{
    const TABLE = "tbl_property";

    protected $propertyID;
    protected $title;
    protected $photos;
    protected $contact;
    protected $price;
    protected $description;
    protected $size;
    protected $tcf;
    protected $bed;
    protected $bath;
    protected $dev;
    protected $ready;
    protected $acf;
    protected $pri;
    protected $location;
    protected $extras;
    protected $status;
    protected $userID;
    protected $propertyType;

    public static function LoadArray(array $ids = null)
    {
        $return = null;
        if (!empty($ids)) {
            foreach ($ids as $id) {
                $data = static::Load($id);
                if ($data) {
                    $return[$id] = $data;
                }
            }
        } else {
            $sql = "SELECT id FROM ".self::TABLE;
            $result = DBcon::execute($sql);
            $data = DBcon::fetch_all_assoc($result);
            if (!empty($data)) {
                foreach ($data as $item) {
                    $return[$item['id']] = static::Load($item['id']);
                }
            }
        }
        return $return;
    }

    // mali to
    public static function Load($id)
    {
        $sql = "SELECT * FROM ".self::TABLE." WHERE id={$id}";
        $result = DBcon::execute($sql);
        $data = DBcon::fetch_assoc($result);
        if (!empty($data)) {
            $new = new static();
            $new->setPropertyID($data['ID']);
            $new->setTitle($data['title']);
            $new->setPhotos($data['photos']);
            $new->setContact($data['contact']);
            $new->setPrice($data['price']);
            $new->setDescription($data['description']);
            $new->setSize($data['size']);
            $new->setTcf($data['tcf']);
            $new->setBed($data['bed']);
            $new->setBath($data['bath']);
            $new->setDev($data['dev']);
            $new->setReady($data['ready']);
            $new->setAcf($data['acf']);
            $new->setPri($data['pri']);
            $new->setLocation($data['location']);
            $new->setExtras($data['extras']);
            $new->setStatus($data['status']);
            $new->setUserID($data['user_id']);
            $new->setPropertyType($data['property_type']);

            return $new;
        } else {
            return false;
        }
    }

    public function submit()
    {
        $data = [
            'title' => $this->getTitle(),
            'photos' => $this->getPhotos(),
            'contact' => $this->getContact(),
            'price' => $this->getPrice(),
            'description' => $this->getDescription(),
            'size' => $this->getSize(),
            'tcf' => $this->getTcf(),
            'bed' => $this->getBed(),
            'bath' => $this->getbath(),
            'dev' => $this->getDev(),
            'ready' => $this->getReady(),
            'acf' => $this->getAcf(),
            'pri' => $this->getPri(),
            'ready' => $this->getReady(),
            'location' => $this->getLocation(),
            'extras' => $this->getExtras(),
            'status' => $this->getStatus(),
            'user_id' => $this->getUserID(),
            'property_type' => $this->getPropertyType(),
        ];

        if (!empty($this->id)) {
            $where = ['id' => $this->getPropertyID()];
            $result = DBcon::update(self::TABLE, $data, $where);
        } else {
            $result = DBcon::insert(self::TABLE, $data);
            $this->setPropertyID($result);
        }
    }

    public static function GetMyProperties($myID){
         $sql = "SELECT id FROM ".self::TABLE." WHERE user_id =".$myID;
         $result = Dbcon::execute($sql);
         $data = Dbcon::fetch_all_assoc($result);
         $ids = [];
         foreach ($data as $item){
             $ids[] = $item['id'];
         }
         return static::LoadArray($ids);
    }

    public function getPropertyID()
    {
        return $this->propertyID;
    }

    public function setPropertyID($id)
    {
        $this->propertyID = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTcf()
    {
        return $this->tcf;
    }

    public function setTcf($tcf)
    {
        $this->tcf = $tcf;
    }

    public function getBed()
    {
        return $this->bed;
    }

    public function setBed($bed)
    {
        $this->bed = $bed;
    }

    public function getBath()
    {
        return $this->bath;
    }

    public function setBath($bath)
    {
        $this->bath = $bath;
    }

    public function getDev()
    {
        return $this->dev;
    }

    public function setDev($dev)
    {
        $this->dev = $dev;
    }

    public function getReady()
    {
        return $this->ready;
    }

    public function setReady($ready)
    {
        $this->ready = $ready;
    }

    public function getAcf()
    {
        return $this->acf;
    }

    public function setAcf($acf)
    {
        $this->acf = $acf;
    }

    public function getPri()
    {
        return $this->pri;
    }

    public function setPri($pri)
    {
        $this->pri = $pri;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getExtras()
    {
        return $this->extras;
    }

    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getPropertyType()
    {
        return $this->propertyType;
    }

    public function setPropertyType($propertyType)
    {
        $this->propertyType = $propertyType;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }
}