<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Entity\Student;
use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

echo 'Qual o ID do aluno que deseja remover? ';
$lerId = fopen('php://stdin', 'r');
$id = fgets($lerId);

/** @var Student $student */
$student = $entityManager->find(Student::class, $id);

if (is_null($student)) {
    echo 'ID não encontrado!';
    exit();
}

echo "Selecionado -> {$student->getName()}".PHP_EOL;
echo 'Tem certeza que deseja excluir? (S/N): ';
$lerConfirma = fopen('php://stdin', 'r');
$confirma = fgets($lerConfirma);

if (($confirma[0] === 'S') || ($confirma[0] === 's')) {
    $entityManager->remove($student);
    $entityManager->flush();
    echo 'Aluno excluído com sucesso!';
} else {
    echo 'Alterações desfeitas!';
}
