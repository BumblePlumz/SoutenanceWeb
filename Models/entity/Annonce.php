<?php
namespace App\Models\entity;

use DateTime;

class Annonce
{
    private int $id;
    private string $href;
    private ?string $title;
    private string $description;
    private ?string $shortDescription;
    private ?int $price;
    private ?int $size;
    private ?string $room;
    private ?string $bedroom;
    private ?string $imgUrl;
    private Address $address;
    private Type $type;
    private DateTime $dateUpdate;
    private DateTime $dateCreation;

    public function __construct() {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): void
    {
        $this->size = $size;
    }

    public function getRoom(): ?string
    {
        return $this->room;
    }

    public function setRoom(?string $room): void
    {
        $this->room = $room;
    }

    public function getBedroom(): ?string
    {
        return $this->bedroom;
    }

    public function setBedroom(?string $bedroom): void
    {
        $this->bedroom = $bedroom;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(?string $imgUrl): void
    {
        $this->imgUrl = $imgUrl;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getDateUpdate(): DateTime
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(DateTime $dateUpdate): void
    {
        $this->dateUpdate = $dateUpdate;
    }

    public function getDateCreation(): DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }
}