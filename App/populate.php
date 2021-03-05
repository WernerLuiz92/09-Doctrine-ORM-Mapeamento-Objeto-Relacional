<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Phone;
use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$targetfile = __DIR__.'/populate.json';

$data = file_get_contents($targetfile);

$array = json_decode($data, true);

$studentList = [];

foreach ($array as $arrStudent) {
    $student = new Student();
    $student->setName($arrStudent['name']);
    $phones = $arrStudent['phones'];
    foreach ($phones as $phone) {
        $areaCode = substr($phone, 0, 2);
        $number = substr($phone, 2);
        $objPhone = new Phone(null, $areaCode, $number);

        $student->addPhone($objPhone);
    }

    $entityManager->persist($student);

    $entityManager->flush();
}
