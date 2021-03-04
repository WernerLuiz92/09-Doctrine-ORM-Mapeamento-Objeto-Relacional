<a href="../index.php">Voltar<br></a>
<?php

use Werner\DoctrineORM\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityNanager();

echo '<pre>';
var_dump($_GET);
echo '</pre>';
