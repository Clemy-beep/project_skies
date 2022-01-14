<?php

namespace App\Entity;

use App\Entity\Passager;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="registration")
 */
class Registration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\Column(type="boolean", name="luggage_overload")
     */
    private bool $luggageOverload;
    /**
     * @ORM\ManyToOne(targetEntity="Flight")
     * @ORM\JoinColumn(name="flight_id", referencedColumnName="id")
     */
    private Flight $flight;
    /**
     * @ORM\OneToOne(targetEntity="Passager")
     * @ORM\JoinColumn(name="passager_id", referencedColumnName="id")
     */
    private Passager $passager;

    public function __construct($f, $p)
    {
        $this->flight = $f;
        $this->passager = $p;
    }


    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of luggageOverload
     *
     * @return bool
     */
    public function getLuggageOverload(): bool
    {
        return $this->luggageOverload;
    }

    /**
     * Set the value of luggageOverload
     *
     * @param bool $luggageOverload
     *
     * @return self
     */
    public function setLuggageOverload(bool $luggageOverload): self
    {
        $this->luggageOverload = $luggageOverload;

        return $this;
    }

    /**
     * Get the value of flight
     *
     * @return Flight
     */
    public function getFlight(): Flight
    {
        return $this->flight;
    }

    /**
     * Set the value of flight
     *
     * @param Flight $flight
     *
     * @return self
     */
    public function setFlight(Flight $flight): self
    {
        $this->flight = $flight;

        return $this;
    }

    /**
     * Get the value of passager
     *
     * @return Passager
     */
    public function getPassager(): Passager
    {
        return $this->passager;
    }

    /**
     * Set the value of passager
     *
     * @param Passager $passager
     *
     * @return self
     */
    public function setPassager(Passager $passager): self
    {
        $this->passager = $passager;

        return $this;
    }
}
