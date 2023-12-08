<?php

namespace App\Models\repository;

use App\Core\DataAccessObject;
use App\Models\DAO;
use App\Models\entity\Type;
use PDO;

class TypeDAO extends DAO
{
    // Instance
    protected static ?TypeDAO $instance = null;
    private string $label = "label";
    public function __construct()
    {
        parent::__construct("type","id");
    }

    public static function getInstance():self
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    function read(int $id):?Type
    {
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        Type: $type = null;
        if ($rs) {
            $type = new Type();
            $type->setId($rs[$this->primaryKey]);
            $type->setLabel($rs[$this->label]);
        }
        return $type;
    }
    function readByLabel($label):?Type
    {
        $query = "SELECT * FROM $this->table WHERE $this->label = :label";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':label', $label);
        $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        Type: $type = null;
        if ($rs) {
            $type = new Type();
            $type->setId($rs[$this->primaryKey]);
            $type->setLabel($rs[$this->label]);
        }
        return $type;
    }
    function update($objet)
    {
        $query = "UPDATE $this->table SET $this->label = :label WHERE $this->primaryKey = :id";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':id', $objet->getId());
        $stmt->bindValue(':label', $objet->getLabel());
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