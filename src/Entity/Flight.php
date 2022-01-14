<?php

namespace App\Entity;

use App\Entity\Airport;
use App\Traits\Nationality;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="flight")
 */
class Flight
{
      /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\Column(type="integer", name="capacity")
     */
    private int $capacity;
     /**
     * @ORM\OneToOne(targetEntity="Airport")
     * @ORM\JoinColumn(name="departure_airport_id", referencedColumnName="id")
     */
    private Airport $airportDeparture;
     /**
     * @ORM\OneToOne(targetEntity="Airport")
     * @ORM\JoinColumn(name="arrival_airport_id", referencedColumnName="id")
     */
    private Airport $airportArrival;
     /**
     * @ORM\Column(type="datetime", name="hour_departure")
     */
    private DateTime $hourDeparture;
     /**
     * @ORM\Column(type="datetime", name="hour_arrival")
     */
    private DateTime $hourArrival;

    public function __construct(int $c, Airport $aD, Airport $aA, DateTime $hD, DateTime $hA)
    {
        $this->capacity = $c;
        $this->airportDeparture = $aD;
        $this->airportArrival = $aA;
        $this->hourDeparture = $hD;
        $this->hourArrival = $hA;
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
     * Get the value of capacity
     *
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @param int $capacity
     *
     * @return self
     */
    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get the value of airportDeparture
     *
     * @return Airport
     */
    public function getAirportDeparture(): Airport
    {
        return $this->airportDeparture;
    }

    /**
     * Set the value of airportDeparture
     *
     * @param Airport $airportDeparture
     *
     * @return self
     */
    public function setAirportDeparture(Airport $airportDeparture): self
    {
        $this->airportDeparture = $airportDeparture;

        return $this;
    }

    /**
     * Get the value of airportArrival
     *
     * @return Airport
     */
    public function getAirportArrival(): Airport
    {
        return $this->airportArrival;
    }

    /**
     * Set the value of airportArrival
     *
     * @param Airport $airportArrival
     *
     * @return self
     */
    public function setAirportArrival(Airport $airportArrival): self
    {
        $this->airportArrival = $airportArrival;

        return $this;
    }

    /**
     * Get the value of hourDeparture
     *
     * @return DateTime
     */
    public function getHourDeparture(): DateTime
    {
        return $this->hourDeparture;
    }

    /**
     * Set the value of hourDeparture
     *
     * @param DateTime $hourDeparture
     *
     * @return self
     */
    public function setHourDeparture(DateTime $hourDeparture): self
    {
        $this->hourDeparture = $hourDeparture;

        return $this;
    }

    /**
     * Get the value of hourArrival
     *
     * @return DateTime
     */
    public function getHourArrival(): DateTime
    {
        return $this->hourArrival;
    }

    /**
     * Set the value of hourArrival
     *
     * @param DateTime $hourArrival
     *
     * @return self
     */
    public function setHourArrival(DateTime $hourArrival): self
    {
        $this->hourArrival = $hourArrival;

        return $this;
    }

    public function registrationOpen(int $regQuant): bool
    {
        if ($this->capacity >= $regQuant) {
            return false;
        }
        return true;
    }
    public function buyTicketOpen(int $sells): bool
    {
        if ($this->capacity >= $sells) {
            return false;
        }
        return true;
    }
}
