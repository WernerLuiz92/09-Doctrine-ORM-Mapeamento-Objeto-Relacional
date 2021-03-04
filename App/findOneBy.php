<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$studentsRepository = $entityManager->getRepository(Student::class);

/** @var Student $student */
$studentsList = $studentsRepository->findBy([
    $argv[1] => $argv[2],
]);

if (count($studentsList) === 0) {
    echo 'Nenhum registro encontrado!'.PHP_EOL;
    exit();
}

foreach ($studentsList as $student) {
    echo "ID: {$student->getId()}".PHP_EOL;
    echo "Nome: {$student->getName()}".PHP_EOL;
    echo '- - - - Contatos - - - -'.PHP_EOL;
    $phones = $student->getPhonesArray();

    foreach ($phones as $phone) {
        echo $phone.PHP_EOL;
    }
    echo PHP_EOL;
}
