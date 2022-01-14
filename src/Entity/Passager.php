<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="passager")
 */
class Passager extends User
{
    /**
     * @ORM\Column(type="integer", name="passport_number")
     */
    private int $passportNum;
    /**
     * @ORM\Column(type="boolean", name="is_buyer")
     */
    private ?bool $isBuyer;

    public function __construct(string $f, string $l, int $p, string $n)
    {
        parent::__construct($f, $l, $n);
        $this->passportNum = $p;
    }

    /**
     * Get the value of passportNum
     *
     * @return int
     */
    public function getPassportNum(): int
    {
        return $this->passportNum;
    }

    /**
     * Set the value of passportNum
     *
     * @param int $passportNum
     *
     * @return self
     */
    public function setPassportNum(int $passportNum): self
    {
        $this->passportNum = $passportNum;

        return $this;
    }

    /**
     * Get the value of isBuyer
     *
     * @return bool
     */
    public function getIsBuyer(): bool
    {
        return $this->isBuyer;
    }

    /**
     * Set the value of isBuyer
     *
     * @param bool $isBuyer
     *
     * @return self
     */
    public function setIsBuyer(bool $isBuyer): self
    {
        $this->isBuyer = $isBuyer;

        return $this;
    }
}
