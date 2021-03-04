<?php

namespace Werner\DoctrineORM\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /** @return EntityManagerInterface */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__.'/../../';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir.'/src'],
            true
        );

        $connection = [
            'driver' => 'pdo_mysql',
            'host' => '172.18.0.10',
            'dbname' => 'curso_doctrine',
            'user' => 'root',
            'password' => 'mysql',
        ];

        return EntityManager::create($connection, $config);
    }
}
