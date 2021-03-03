<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$aluno = new Student();
$aluno->setName('Werner Luiz Gottschalt');

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

$entityManager->persist($aluno);

$entityManager->flush();
