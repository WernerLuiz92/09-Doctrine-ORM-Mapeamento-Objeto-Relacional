<?php

namespace Werner\DoctrineORM\Repository;

use Doctrine\ORM\EntityRepository;
use Werner\DoctrineORM\Entity\Student;

class StudentRepository extends EntityRepository
{
    public function listCoursesByStudent()
    {
        $entityManager = $this->getEntityManager();

        $studentClass = Student::class;
        $dql = "SELECT s, p, c FROM $studentClass s JOIN s.phones p JOIN s.courses c";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}
