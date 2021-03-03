<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$studentsRepository = $entityManager->getRepository(Student::class);

/** @var Student $student */
$student = $studentsRepository->find($argv[1]);

if ($student) {
    echo "ID: {$student->getId()}".PHP_EOL;
    echo "Nome: {$student->getName()}".PHP_EOL;
    echo PHP_EOL;
} else {
    echo 'Aluno não encontrado!'.PHP_EOL;
    echo PHP_EOL;
}
