<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Phone;
use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$student = new Student();
$student->setName($argv[1]);

for ($i = 2; $i < $argc; ++$i) {
    $completePhoneNumber = $argv[$i];
    $areaCode = substr($completePhoneNumber, 0, 2);
    $number = substr($completePhoneNumber, 2);
    $phone = new Phone(null, $areaCode, $number);

    $entityManager->persist($phone);

    $student->addPhone($phone);
}

$entityManager->persist($student);

$entityManager->flush();
