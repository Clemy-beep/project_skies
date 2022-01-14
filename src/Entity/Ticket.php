<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ticket")
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\OneToOne(targetEntity="Passager")
     * @ORM\JoinColumn(name="passager_id", referencedColumnName="id")
     */
    private Passager $passager;
    /**
     * @ORM\ManyToMany(targetEntity="Flight")
     * @ORM\JoinTable(name="flight_ticket",
     *      joinColumns={@ORM\JoinColumn(name="flight_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ticket_id", referencedColumnName="id")}
     *      )
     */
    private Collection $flights;

    public function __construct(Passager $p, Collection $f)
    {
        $this->passager = $p;
        $this->flights = $f;
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
     * Get the value of flights
     */
    public function getFlights()
    {
        return $this->flights;
    }

    /**
     * Set the value of flights
     */
    public function setFlights($flights): self
    {
        $this->flights = $flights;

        return $this;
    }
}
