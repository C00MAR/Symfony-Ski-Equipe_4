<?php

namespace App\Entity;

use App\Repository\PisteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PisteRepository::class)]
class Piste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $open_hour = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $close_hour = null;

    #[ORM\Column]
    private ?bool $fermeture = null;

    #[ORM\Column(length: 255)]
    private ?string $fermeture_message = null;

    #[ORM\Column(length: 255)]
    private ?string $Difficulty = null;

    #[ORM\ManyToOne(inversedBy: 'pistes')]
    private ?station $station = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOpenHour(): ?\DateTimeInterface
    {
        return $this->open_hour;
    }

    public function setOpenHour(\DateTimeInterface $open_hour): self
    {
        $this->open_hour = $open_hour;

        return $this;
    }

    public function getCloseHour(): ?\DateTimeInterface
    {
        return $this->close_hour;
    }

    public function setCloseHour(\DateTimeInterface $close_hour): self
    {
        $this->close_hour = $close_hour;

        return $this;
    }

    public function isFermeture(): ?bool
    {
        return $this->fermeture;
    }

    public function setFermeture(bool $fermeture): self
    {
        $this->fermeture = $fermeture;

        return $this;
    }

    public function getFermetureMessage(): ?string
    {
        return $this->fermeture_message;
    }

    public function setFermetureMessage(string $fermeture_message): self
    {
        $this->fermeture_message = $fermeture_message;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->Difficulty;
    }

    public function setDifficulty(string $Difficulty): self
    {
        $this->Difficulty = $Difficulty;

        return $this;
    }

    public function getStation(): ?station
    {
        return $this->station;
    }

    public function setStation(?station $station): self
    {
        $this->station = $station;

        return $this;
    }
}
