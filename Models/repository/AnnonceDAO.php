<?php

namespace App\Models\repository;

use App\Core\DataAccessObject;
use App\Models\DAO;
use App\Models\entity\Address;
use App\Models\entity\Annonce;
use App\Models\entity\Type;
use DateTime;
use PDO;

class AnnonceDAO extends DAO
{
    // Instance
    protected static ?AnnonceDAO $instance = null;
    private string $href = "href";
    private string $title = "title";
    private string $description = "description";
    private string $price = "price";
    private string $size = "size";
    private string $room = "room";
    private string $bedroom = "bedroom";
    private string $imgUrl = "imgUrl";
    private string $address = "address_id";
    private string $type = "type_id";
    private string $dateUpdate = "dateUpdate";
    private string $dateCreation = "dateCreation";

    public function __construct()
    {
        parent::__construct("annonce","id");
    }

    public static function getInstance():self
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    function read(int $id):Annonce
    {
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        Annonce: $annonce = null;
        if ($rs) {
            $annonce = new Annonce();
            $annonce->setId($rs[$this->primaryKey]);
            $annonce->setHref($rs[$this->href]);
            $annonce->setTitle($rs[$this->title]);
            $annonce->setDescription($rs[$this->description]);
            $annonce->setPrice($rs[$this->price]);
            $annonce->setSize($rs[$this->size]);
            $annonce->setRoom($rs[$this->room]);
            $annonce->setBedroom($rs[$this->bedroom]);
            $annonce->setImgUrl($rs[$this->imgUrl]);

            $dateString = $rs[$this->dateUpdate];
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
            $annonce->setDateUpdate($dateTime);

            $dateString = $rs[$this->dateCreation];
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
            $annonce->setDateCreation($dateTime);

            Address: $addr = AddressDAO::getInstance()->read($rs[$this->address]);
            $annonce->setAddress($addr);
            Type: $type = TypeDAO::getInstance()->read($rs[$this->type]);
            $annonce->setType($type);
        }
        return $annonce;
    }

    function readAll():array
    {
        $query = "SELECT * FROM $this->table";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listAds = [];
        foreach ($results as $rs){
            Annonce: $annonce = new Annonce();
            $annonce->setId($rs[$this->primaryKey]);
            $annonce->setHref($rs[$this->href]);
            $annonce->setTitle($rs[$this->title]);
            $annonce->setDescription($rs[$this->description]);
            $annonce->setPrice($rs[$this->price]);
            $annonce->setSize($rs[$this->size]);
            $annonce->setRoom($rs[$this->room]);
            $annonce->setBedroom($rs[$this->bedroom]);
            $annonce->setImgUrl($rs[$this->imgUrl]);
            
            $dateString = $rs[$this->dateUpdate];
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
            $annonce->setDateUpdate($dateTime);

            $dateString = $rs[$this->dateCreation];
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
            $annonce->setDateCreation($dateTime);

            Address: $addr = AddressDAO::getInstance()->read($rs[$this->address]);
            $annonce->setAddress($addr);
            Type: $type = TypeDAO::getInstance()->read($rs[$this->type]);
            $annonce->setType($type);
            $listAds[] = $annonce;
        }
        return $listAds;
    }

    function update($object): bool
    {
        $query = "UPDATE $this->table SET 
              $this->href = :href,
              $this->title = :title,
              $this->description = :description,
              $this->price = :price,
              $this->size = :size,
              $this->room = :room,
              $this->bedroom = :bedroom,
              $this->imgUrl = :imgUrl,
              $this->address = :address,
              $this->type= :type,
              $this->dateUpdate = :dateUpdate
              WHERE $this->primaryKey = :id";

        $stmt = $this->getDb()->prepare($query);
        $stmt->bindValue(':href', $object->getHref());
        $stmt->bindValue(':title', $object->getTitle());
        $stmt->bindValue(':description', $object->getDescription());
        $stmt->bindValue(':price', $object->getPrice());
        $stmt->bindValue(':size', $object->getSize());
        $stmt->bindValue(':room', $object->getRoom());
        $stmt->bindValue(':bedroom', $object->getBedroom());
        $stmt->bindValue(':imgUrl', $object->getImgUrl());
        $stmt->bindValue(':address', $object->getAddress());
        $stmt->bindValue(':type', $object->getType());
        $stmt->bindValue(':dateUpdate', $object->getDateUpdate());
        $stmt->bindValue(':id', $object->getId());

        return $stmt->execute();
    }


    function delete($objet)
    {
        $query = "DELETE FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':id', $objet->getId());
        return $stmt->execute();
    }

    function create($objet)
    {
        $query = "INSERT INTO $this->table ($this->label) VALUES (:label)";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':label', $objet->getLabel());
        return $stmt->execute();
    }
}