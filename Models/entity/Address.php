<?php

namespace App\Models\entity;

class Address
{
    private int $id;
    private string $codeSeLoger;
    private string $codeOuestFrance;
    private string $city;
    private string $department;
    private string $postcode;

    public function __construct() {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodeSeLoger(): string
    {
        return $this->codeSeLoger;
    }

    public function setCodeSeLoger(string $codeSeLoger): void
    {
        $this->codeSeLoger = $codeSeLoger;
    }

    public function getCodeOuestFrance(): string
    {
        return $this->codeOuestFrance;
    }

    public function setCodeOuestFrance(string $codeOuestFrance): void
    {
        $this->codeOuestFrance = $codeOuestFrance;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }



}