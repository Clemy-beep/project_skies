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

AppController::createTicket();
