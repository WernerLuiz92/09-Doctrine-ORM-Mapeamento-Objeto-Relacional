<?php

namespace Werner\DoctrineORM\Repository;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function listCoursesByStudent()
    {
        $query = $this->createQueryBuilder('student')
            ->join('student.phones', 'phones')
            ->join('student.courses', 'courses')
            ->addSelect('phones')
            ->addSelect('courses')
            ->getQuery();

        return $query->getResult();
    }
}
