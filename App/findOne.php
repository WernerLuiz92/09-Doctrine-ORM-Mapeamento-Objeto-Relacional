<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;
use Werner\DoctrineORM\Helper\MapArrayPhones;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentsRepository = $entityManager->getRepository(Student::class);

/** @var Student $student */
$student = $studentsRepository->find($argv[1]);

if ($student) {
    echo "ID: {$student->getId()}".PHP_EOL;
    echo "Nome: {$student->getName()}".PHP_EOL;
    echo '- - - - Contatos - - - -'.'<br>';
    $phones = MapArrayPhones::getPhonesArray($student->getPhones());

    foreach ($phones as $phone) {
        echo '&ensp; -> '.$phone.'<br>';
    }
    echo '<br>';
} else {
    echo 'Aluno não encontrado!'.PHP_EOL;
    echo PHP_EOL;
}
