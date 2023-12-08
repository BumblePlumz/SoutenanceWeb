<?php
namespace App\Models\repository;

use App\Core\DataAccessObject;
use App\Models\DAO;
use App\Models\entity\Address;
use PDO;

class AddressDAO extends DAO
{
    // Instance
    protected static ?AddressDAO $instance = null;
    private string $codeSeLoger = "codeSeloger";
    private string $codeOuestFrance = "codeOuestFrance";
    private string $city = "city";
    private string $department = "department";
    private string $postcode = "postcode";

    public function __construct()
    {
        parent::__construct("address","id");
    }

    public static function getInstance():self
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    function read($id): Address
    {
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        Address: $address = null;
        if ($rs) {
            $address = new Address();
            $address->setId($rs[$this->primaryKey]);
            $address->setCodeSeLoger($rs[$this->codeSeLoger]);
            $address->setCodeOuestFrance($rs[$this->codeOuestFrance]);
            $address->setCity($rs[$this->city]);
            $address->setDepartment($rs[$this->department]);
            $address->setPostcode($rs[$this->postcode]);
        }
        return $address;
    }

    function update($object)
    {
        $query = "UPDATE $this->table SET 
              $this->codeSeLoger = :codeSeLoger,
              $this->codeOuestFrance = :codeOuestFrance,
              $this->city = :city,
              $this->department = :department,
              $this->postcode = :postcode
              WHERE $this->primaryKey = :id";

        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':codeSeLoger', $object->getCodeSeLoger());
        $stmt->bindValue(':codeOuestFrance', $object->getCodeOuestFrance());
        $stmt->bindValue(':city', $object->getCity());
        $stmt->bindValue(':department', $object->getDepartment());
        $stmt->bindValue(':postcode', $object->getPostcode());
        $stmt->bindValue(':id', $object->getId());

        return $stmt->execute();
    }

    function delete($object)
    {
        $query = "DELETE FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':id', $object->getId());
        return $stmt->execute();
    }

    function create($object)
    {
        $query = "INSERT INTO $this->table 
              ($this->codeSeLoger, $this->codeOuestFrance}, 
              $this->city, $this->department, $this->postcode})
              VALUES (:codeSeLoger, :codeOuestFrance, :city, :department, :postcode)";

        $stmt = DataAccessObject::getInstance()->prepare($query);
        $stmt->bindValue(':codeSeLoger', $object->getCodeSeLoger());
        $stmt->bindValue(':codeOuestFrance', $object->getCodeOuestFrance());
        $stmt->bindValue(':city', $object->getCity());
        $stmt->bindValue(':department', $object->getDepartment());
        $stmt->bindValue(':postcode', $object->getPostcode());

        return $stmt->execute();
    }

}