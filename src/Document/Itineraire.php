<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document]
class Itineraire
{
    #[ODM\Id]
    private ?string $id = null;  

    #[ODM\Field(type: "date")]
    private ?\DateTime $jour = null;

    #[ODM\Field(type: "string")]
    private string $depart;

    #[ODM\Field(type: "string")]
    private string $arrive;

    // Getters & Setters
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getJour(): ?\DateTime
    {
        return $this->jour;
    }

    public function getDepart(): ?string
    {
        return $this->depart;
    }

    public function getArrive(): ?string
    {
        return $this->arrive;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;
        return $this;
    }

    public function setDepart(string $depart): self
    {
        $this->depart = $depart;
        return $this;
    }

    public function setArrive(string $arrive): self
    {
        $this->arrive = $arrive;
        return $this;
    }
}
