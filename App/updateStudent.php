<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$studentsRepository = $entityManager->getRepository(Student::class);

echo 'Qual o ID do aluno que deseja alterar? ';
$lerId = fopen('php://stdin', 'r');
$id = fgets($lerId);

/** @var Student $student */
$student = $entityManager->find(Student::class, $id);

echo "Selecionado -> {$student->getName()}".PHP_EOL;
echo 'Qual o novo nome do aluno: ';
$lerNome = fopen('php://stdin', 'r');
$newName = fgets($lerNome);

$student->setName($newName);
$entityManager->flush();
