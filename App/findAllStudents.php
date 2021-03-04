<a href="../index.php">Voltar<br></a>
<?php

use Doctrine\DBAL\Logging\DebugStack;
use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$dql = 'SELECT aluno FROM Werner\\DoctrineORM\\Entity\\Student aluno WHERE aluno.name LIKE \'%da%\'';

$query = $entityManager->createQuery($dql);

/** @var Student[] $studentsList */
$studentsList = $query->getResult();

// echo '<pre>';
// var_dump($studentsList);
// echo '</pre>';
foreach ($studentsList as $student) {
    echo "ID: {$student->getId()}".'<br>';
    echo "Nome: {$student->getName()}".'<br>';
    echo '- - - - Contatos - - - -'.'<br>';
    $phones = $student->getPhonesArray();

    foreach ($phones as $phone) {
        echo '&ensp; -> '.$phone.'<br>';
    }
    echo '<br>';
    echo '- - - -- Cursos -- - - -'.'<br>';
    $courses = $student->getCourses()->toArray();

    foreach ($courses as $course) {
        echo '&ensp; * '.$course->getname().'<br>';
    }
    echo '<br>';
}

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'].'<br>';
}
