<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\PropertyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: PropertyRepository::class)]
#[ORM\Table(name:"property")]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('title')]



class Property
{
    use Timestampable;

    const TYPE = [
        0=>'Villa',
        1=>'Studio',
        2=>'Duplex',
        3=>'Appartement',
    ];
    const STATUS = [
        0=>'A vendre',
        1=>'A louer',
        2=>'Colocation',
    ];
    const FLOOR = [
        0=>'Parquet',
        1=>'Carrelage',
        2=>'Moquette',
        3=>'Sol souple',
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Donnez un titre à votre bien')]
    #[Assert\Length(min:3)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message:'Donnez une description à votre bien')]
    #[Assert\Length(min:50)]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:'La superficie est obligatoire')]
    private ?int $surface = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:'Le nombre de piéces est oligatoire')]
    private ?int $rooms = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:'le nombre de chambres est obligatoire')]
    private ?int $bedrooms = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'veuillez preciser quel type de sol ')]
    private ?string $floor = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'precisez dans quelle ville se trouve le bien')]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"l'addresse précise du bien")]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $postalCode = null;

    #[ORM\Column(options:['default'=>false])]
    #[Assert\NotBlank(message:"Mentionnez si c'est vendu ou pas /louer ou libre")]
    private ?bool $sold = false;

    #[ORM\Column]
    private ?int $parking = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:'obligatoire')]
    private ?int $status = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:'Mentionner le type de bien')]
    private ?int $type = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Veuillez mettre un prix de location ou d'achat")]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"precisez dans quel pays se trouve le bien")]
    private ?string $country = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(string $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function isSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getParking(): ?int
    {
        return $this->parking;
    }

    public function setParking(int $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }
    public function getStatusType(): string 
    {
        return self::STATUS[$this->status];
    }
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getTypeType(): string 
    {
        return self::TYPE[$this->type];
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getPrice(): ?int
    {
        return $this->price;
    }
    public function getFormattedPrice(): string 
    {
        return number_format($this->price,0,'  ','  ');
    }
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
