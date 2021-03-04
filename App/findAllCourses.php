<?php

use Werner\DoctrineORM\Entity\Course;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$coursesRepository = $entityManager->getRepository(Course::class);

/** @var Course[] $coursesList */
$coursesList = $coursesRepository->findAll();

foreach ($coursesList as $course) {
    echo "ID: {$course->getId()}".PHP_EOL;
    echo "Nome: {$course->getName()}".PHP_EOL;
    echo '- - - - Alunos - - - -'.PHP_EOL;
    $students = $course->getStudents()->toArray();

    foreach ($students as $student) {
        echo $student->getname().PHP_EOL;
    }
    echo PHP_EOL;
}
