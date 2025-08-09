<?php

namespace App\Entity;

use App\Repository\StatisticRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatisticRepository::class)]
class Statistic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $national_turnover_avg = null;

    #[ORM\Column]
    private ?float $region_turnover_avg = null;

    #[ORM\Column]
    private ?float $dept_turnover_avg = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalTurnoverAvg(): ?float
    {
        return $this->national_turnover_avg;
    }

    public function setNationalTurnoverAvg(float $national_turnover_avg): static
    {
        $this->national_turnover_avg = $national_turnover_avg;

        return $this;
    }

    public function getRegionTurnoverAvg(): ?float
    {
        return $this->region_turnover_avg;
    }

    public function setRegionTurnoverAvg(float $region_turnover_avg): static
    {
        $this->region_turnover_avg = $region_turnover_avg;

        return $this;
    }

    public function getDeptTurnoverAvg(): ?float
    {
        return $this->dept_turnover_avg;
    }

    public function setDeptTurnoverAvg(float $dept_turnover_avg): static
    {
        $this->dept_turnover_avg = $dept_turnover_avg;

        return $this;
    }
}
