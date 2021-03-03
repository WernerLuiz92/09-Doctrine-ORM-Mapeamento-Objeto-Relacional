<?php

use Werner\DoctrineORM\Entity\Phone;
use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$studentsRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentsList */
$studentsList = $studentsRepository->findAll();

foreach ($studentsList as $student) {
    echo "ID: {$student->getId()}".PHP_EOL;
    echo "Nome: {$student->getName()}".PHP_EOL;
    echo '- - - - Contatos - - - -'.PHP_EOL;
    $phones = mapPhoneCollection($student);

    foreach ($phones as $phone) {
        echo $phone.PHP_EOL;
    }
    echo PHP_EOL;
}

function mapPhoneCollection(Student $student)
{
    $phones = $student
        ->getPhones()
        ->map(function (Phone $phone) {
            return $phone->getFormattedPhone();
        }
    )->toArray();

    return $phones;
}
