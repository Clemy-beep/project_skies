<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Helpers\EntityManagerHelper as Em;
use App\Entity\Ticket;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client extends User
{
    public function __construct(string $f, string $l, string $n)
    {
        parent::__construct($f, $l, $n);
    }

    public function buyTicket(string $firstname, string $lastname, int $passportNum, bool $isBuyer, Collection $flights): void
    {
        $entityManager = Em::getEntityManager();
        $newPassager = new Passager($firstname, $lastname, $passportNum, $isBuyer);
        $newTicket = new Ticket($newPassager, $flights);
        $entityManager->persist($newTicket);
        $entityManager->flush();
    }

    public function cancelTicket(int $ticketId): void
    {
        $entityManager =  Em::getEntityManager();
        $ticket = $entityManager->find('tickets', $ticketId);
        $entityManager->remove($ticket);
        $entityManager->flush();
    }
}
