<?php

namespace App\Entity;

use App\Repository\TurnoverRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TurnoverRepository::class)]
class Turnover
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['turnover:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['turnover:read'])]
    private ?\DateTime $date = null;

    #[ORM\Column]
    #[Groups(['turnover:read'])]    
    private ?float $amount = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]  
    #[Groups(['turnover:read'])] 
    private ?Salons $salon_fk = null;

    #[ORM\Column(length: 255)]
    #[Groups(['turnover:read'])]
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

    public function getSalonFk(): ?Salons
    {
        return $this->salon_fk;
    }

    public function setSalonFk(?Salons $salon_fk): static
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
