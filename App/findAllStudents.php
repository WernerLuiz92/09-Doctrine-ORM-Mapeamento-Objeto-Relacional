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
    echo "ID: {$student->getId()}".PHP_EOL;
    echo "Nome: {$student->getName()}".PHP_EOL;
    echo '- - - - Contatos - - - -'.PHP_EOL;
    $phones = $student->getPhonesArray();

    foreach ($phones as $phone) {
        echo $phone.PHP_EOL;
    }
    echo PHP_EOL;
    echo '- - - -- Cursos -- - - -'.PHP_EOL;
    $courses = $student->getCourses()->toArray();

    foreach ($courses as $course) {
        echo $course->getname().PHP_EOL;
    }
    echo PHP_EOL;
}
