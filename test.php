<?php

use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

echo '<pre>';
var_dump($entityManager->getConnection());
echo '</pre>';
