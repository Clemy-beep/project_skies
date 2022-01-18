<?php

namespace App\Controller;

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
    // public static function createTicket(): Ticket
    // {
    //     $em = EntityManagerHelper::getEntityManager();
    //     $departure = new Airport('New York', "american");
    //     $arrival = new Airport('Casablanca', "moroccan");

    //     $client = new Client("Paul", "Pot", "french");
    //     $passager = new Passager('Odile', 'Soeur', 8741, 'german');
    //     $passager->setIsBuyer(false);
    //     $flight = new Flight(741, $departure, $arrival, new DateTime(), new DateTime());
    //     $flights = new ArrayCollection([$flight]);

    //     $ticket = new Ticket($passager, $flights);

    //     try {
    //         $em->persist($departure);
    //         $em->persist($arrival);
    //         $em->persist($client);
    //         $em->persist($passager);
    //         $em->persist($flight);
    //         $em->persist($ticket);
    //         $em->flush();
    //     } catch (Exception $e) {
    //         $msg = $e->getMessage();
    //         $code = $e->getCode();
    //         echo "Error $code : $msg";
    //     }
    //     return $ticket;
    // }
    public static function index()
    {
        include("./src/View/Homepage.php");
    }

    public static function showForm()
    {
        include("./src/View/FormVIew.php");
    }

    public static function formCheck()
    {
        $em = EntityManagerHelper::getEntityManager();
        if (isset($_POST["firstname"], $_POST['lastname'], $_POST['nationality'])) {
            var_dump($_POST);
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $nationality = $_POST['nationality'];
            $client = new Client($firstname, $lastname, $nationality);
            try {
                $em->persist($client);
                $em->flush();
            } catch (Exception $e) {
                $msg = $e->getMessage();
                $code = $e->getCode();
                echo "Error $code : $msg";
            }
        } else throw new Exception("Empty POST array", 01);
        return $client;
    }

    public static function showClient(string $id)
    {
        include('./src/View/UpdateClient.php');
    }

    public static function updateClient($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        if (isset($_POST["firstname"], $_POST['lastname'], $_POST['nationality'])) {
            $client = $em->getRepository(Client::class)->find($id);
            $client->setFirstName($_POST['firstname']);
            $client->setLastName($_POST['lastname']);
            $client->setNationality($_POST['nationality']);
            try {
                $em->flush();
                echo "Client $id updated !";
            } catch (Exception $e) {
                $msg = $e->getMessage();
                $code = $e->getCode();
                echo "Error $code : $msg";
            }
        } else throw new Exception("Empty POST array", 01);

        return $client;
    }

    public static function deleteClient($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('client')
            ->from('App\Entity\Client', 'client')
            ->where('client.id = :id');
        $query->setParameter('id', $id);
        $client = $query->getQuery()->getResult();
        $client = $client[0];
        try {
            $em->remove($client);
            $em->flush();
            echo "Client $id removed !";
            echo '<a href="http://127.0.0.6/">Back to home</a>';
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $code = $e->getCode();
            echo "Error $code : $msg";
        }
    }

    public static function fetchClientInfos($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        try {
            $query = $em->createQueryBuilder();
            $query->select('client')
                ->from('App\Entity\Client', 'client')
                ->where('client.id = :id');
            $query->setParameter('id', $id);
            $client = $query->getQuery()->getResult();
            $client = $client[0];
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $code = $e->getCode();
            echo "Error $code : $msg";
        }
        return $client;
    }
}
