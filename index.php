<?php

require 'bootstrap.php';
use App\Controllers\AppController;
use App\Entity\Airport;
use App\Entity\Client;
use App\Entity\Flight;
use App\Entity\Passager;
use App\Entity\Ticket;
use Doctrine\Common\Collections\ArrayCollection;

require __DIR__.'/vendor/autoload.php';

$departure = new Airport('New York', "american");
$arrival = new Airport('Casablanca', "moroccan");

$client = new Client("Paul", "Pot", "french");
$passager = new Passager('Odile', 'Soeur', 8741, 'german');
$passager->setIsBuyer(false);
$flight = new Flight(741, $departure, $arrival, new DateTime(), new DateTime());
$flights = new ArrayCollection([$flight]);

$ticket = new Ticket($passager, $flights);

$entityManager->persist($departure);
$entityManager->persist($arrival);
$entityManager->persist($client);
$entityManager->persist($passager);
$entityManager->persist($flight);
$entityManager->persist($ticket);
$entityManager->flush();
