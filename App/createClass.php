<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Course;
use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

echo 'Qual o ID do curso que deseja criar a turma? ';
$read = fopen('php://stdin', 'r');
$courseId = fgets($read);
echo PHP_EOL;

/** @var Course $course */
$course = $entityManager->find(Course::class, $courseId);

echo "Selecionado -> {$course->getName()}".PHP_EOL;
echo 'Quantos alunos deseja adicionar a turma? ';
$read = fopen('php://stdin', 'r');
$n = fgets($read);

for ($i = 0; $i < $n; ++$i) {
    echo 'Qual o ID do aluno que deseja adicionar a turma? ';
    $read = fopen('php://stdin', 'r');
    $studentId = fgets($read);
    echo PHP_EOL;

    /** @var Student $student */
    $student = $entityManager->find(Student::class, $studentId);
    $course->addStudent($student);

    echo "{$student->getName()} adicionado na turma!".PHP_EOL;
    echo PHP_EOL;
}

$entityManager->flush();
