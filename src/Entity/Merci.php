<?php

namespace App\Entity;

use App\Repository\MerciRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MerciRepository::class)]
class Merci
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fromEmployee = null;

    #[ORM\Column(length: 255)]
    private ?string $toEmployee = null;

    #[ORM\Column(type: 'text')]
    private ?string $message = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromEmployee(): ?string
    {
        return $this->fromEmployee;
    }

    public function setFromEmployee(string $fromEmployee): self
    {
        $this->fromEmployee = $fromEmployee;

        return $this;
    }

    public function getToEmployee(): ?string
    {
        return $this->toEmployee;
    }

    public function setToEmployee(string $toEmployee): self
    {
        $this->toEmployee = $toEmployee;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
