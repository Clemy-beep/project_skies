<?php

namespace App\Controllers;

use App\Entity\Airport;
use App\Entity\Client;
use App\Entity\Flight;
use App\Entity\Passager;
use App\Entity\Ticket;
use App\Helpers\EntityManagerHelper;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;

class AppController
{
    // public static function createClient(string $firstname, string $lastname, string $nationality): Client
    // {
    //     $em = EntityManagerHelper::getEntityManager();
    //     $client = new Client($firstname, $lastname, $nationality);
    //     try {
    //         $em->persist($client);
    //         $em->flush();
    //     } catch (Exception $e) {
    //         $code =  $e->getCode();
    //         $message =  $e->getMessage();
    //         echo "Error $code : $message ";
    //     }
    //     return $client;
    // }

    // public static function createPassager(Client $client, string $firstname, string $lastname, int $passportNumber, string $nationality): Passager
    // {
    //     $em = EntityManagerHelper::getEntityManager();

    //     $passager = new Passager($firstname, $lastname, $passportNumber, $nationality);
    //     if ($passager->getFirstName() === $client->getFirstName() && $passager->getLastName() === $client->getLastName())
    //         $passager->setIsBuyer(true);
    //     else
    //         $passager->setIsBuyer(false);
    //     try {
    //         $em->persist($passager);
    //         $em->flush();
    //     } catch (Exception $e) {
    //         $code =  $e->getCode();
    //         $message =  $e->getMessage();
    //         echo "Error $code : $message ";
    //     }
    //     return $passager;
    // }

    // public static function createAirport(string $name, string $nationality): Airport
    // {
    //     $em = EntityManagerHelper::getEntityManager();
    //     $airPort = new Airport($name, $nationality);
    //     try {
    //         $em->persist($airPort);
    //         $em->flush();
    //     } catch (Exception $e) {
    //         $code =  $e->getCode();
    //         $message =  $e->getMessage();
    //         echo "Error $code : $message ";
    //     }
    //     return $airPort;
    // }

    // public static function createFlight(int $capacity, Airport $departure, Airport $arrival, DateTime $hourArrival, DateTime $hourDeparture): Flight
    // {
    //     $em = EntityManagerHelper::getEntityManager();
    //     $flight = new Flight($capacity, $departure, $arrival, $hourDeparture, $hourArrival);
    //     try {
    //         $em->persist($departure);
    //         $em->persist($arrival);
    //         $em->persist($flight);
    //         $em->flush();
    //     } catch (Exception $e) {
    //         $code =  $e->getCode();
    //         $message =  $e->getMessage();
    //         echo "Error $code : $message ";
    //     }
    //     return $flight;
    // }
    // public static function createTicket(Passager $pass, ArrayCollection $flights): Ticket
    // {
    //     $em = EntityManagerHelper::getEntityManager();
    //     $passager = $pass;



    //     $flights = new ArrayCollection([]);

    //     $ticket = new Ticket($passager, $flights);
    //     try {
    //         $em->persist($passager);
    //         $em->persist($ticket);
    //         $em->flush();
    //     } catch (Exception $e) {
    //         $code =  $e->getCode();
    //         $message =  $e->getMessage();
    //         echo "Error $code : $message ";
    //     }
    //     return $ticket;
    // }
}
