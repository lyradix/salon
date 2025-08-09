<?php

namespace App\Entity;

use App\Repository\SalonsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalonsRepository::class)]
class Salons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $opening_date = null;

    #[ORM\Column]
    private ?int $no_employees_full_time = null;

    #[ORM\Column(length: 255)]
    private ?string $rep_name = null;

    #[ORM\Column(length: 255)]
    private ?string $rep_first_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getOpeningDate(): ?\DateTime
    {
        return $this->opening_date;
    }

    public function setOpeningDate(\DateTime $opening_date): static
    {
        $this->opening_date = $opening_date;

        return $this;
    }

    public function getNoEmployeesFullTime(): ?int
    {
        return $this->no_employees_full_time;
    }

    public function setNoEmployeesFullTime(int $no_employees_full_time): static
    {
        $this->no_employees_full_time = $no_employees_full_time;

        return $this;
    }

    public function getRepName(): ?string
    {
        return $this->rep_name;
    }

    public function setRepName(string $rep_name): static
    {
        $this->rep_name = $rep_name;

        return $this;
    }

    public function getRepFirstName(): ?string
    {
        return $this->rep_first_name;
    }

    public function setRepFirstName(string $rep_first_name): static
    {
        $this->rep_first_name = $rep_first_name;

        return $this;
    }
}
