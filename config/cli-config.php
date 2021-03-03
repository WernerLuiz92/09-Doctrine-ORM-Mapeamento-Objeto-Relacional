<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

// replace with file to your own project bootstrap

require_once __DIR__.'/../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

return ConsoleRunner::createHelperSet($entityManager);
