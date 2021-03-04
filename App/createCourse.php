<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Course;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course();
$course->setName($argv[1]);

$entityManager->persist($course);
$entityManager->flush();
