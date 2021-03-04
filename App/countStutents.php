<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$Student = Student::class;

$dql = "SELECT COUNT(s) FROM $Student s";
$query = $entityManager->createQuery($dql);
$count = $query->getSingleScalarResult();

echo "A quantidade de alunos cadastrados é: $count <br>";
