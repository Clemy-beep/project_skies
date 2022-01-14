<?php

namespace App\Traits;
use Doctrine\ORM\Mapping as ORM;


trait Nationality
{
    /**
     * @ORM\Column(type="string", name="nationality")
     */
    private string $nationality;

    public function __construct(string $n)
    {
        $this->nationality = $n;
    }
    /**
     * Get the value of nationality
     *
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * Set the value of nationality
     *
     * @param string $nationality
     *
     * @return self
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }
}
