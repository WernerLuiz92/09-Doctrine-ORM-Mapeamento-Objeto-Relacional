<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Course;
use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$courseId = $argv[1];
$studentId = $argv[2];

/** @var Course $course */
$course = $entityManager->find(Course::class, $courseId);
/** @var Student $student */
$student = $entityManager->find(Student::class, $studentId);

$course->addStudent($student);

$entityManager->flush();
