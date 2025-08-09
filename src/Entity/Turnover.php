<?php

namespace App\Entity;

use App\Repository\TurnoverRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurnoverRepository::class)]
class Turnover
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?salons $salon_fk = null;

    #[ORM\Column(length: 255)]
    private ?string $dept_region = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getSalonFk(): ?salons
    {
        return $this->salon_fk;
    }

    public function setSalonFk(?salons $salon_fk): static
    {
        $this->salon_fk = $salon_fk;

        return $this;
    }

    public function getDeptRegion(): ?string
    {
        return $this->dept_region;
    }

    public function setDeptRegion(string $dept_region): static
    {
        $this->dept_region = $dept_region;

        return $this;
    }
}
