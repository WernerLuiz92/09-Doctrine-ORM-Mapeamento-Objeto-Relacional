<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentsRepository = $entityManager->getRepository(Student::class);

/** @var Student $student */
$studentsList = $studentsRepository->findBy([
    $_GET['field'] => $_GET['value'],
]);

if (count($studentsList) === 0) {
    echo 'Nenhum registro encontrado!'.'<br>';
    exit();
}

foreach ($studentsList as $student) {
    echo "ID: {$student->getId()}".'<br>';
    echo "Nome: {$student->getName()}".'<br>';
    echo '- - - - Contatos - - - -'.'<br>';
    $phones = $student->getPhonesArray();

    foreach ($phones as $phone) {
        echo $phone.'<br>';
    }
    echo '<br>';
}
