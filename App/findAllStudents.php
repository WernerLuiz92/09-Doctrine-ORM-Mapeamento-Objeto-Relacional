<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$studentsRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentsList */
$studentsList = $studentsRepository->findAll();

foreach ($studentsList as $student) {
    echo "ID: {$student->getId()} <br>";
    echo "Nome: {$student->getName()} <br>";
    echo '<br>';
}
